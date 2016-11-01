<?php

/**
 * This is simple holder for content in a tile on the homepage.
 */

class TileRow extends DataObject
{

	/**
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Varchar(255)',
		'SortOrder' => 'Int',
	);

	/**
	 * @var array
	 */
	private static $has_many = array(
		'Tiles' => 'Tile',
	);

	/**
	 * @var array
	 */
	private static $has_one = array(
		'Page' => 'TilesPage',
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName('Tiles');
		$fields->removeByName('PageID');
		$fields->removeByName('SortOrder');

		$config = GridFieldConfig_RelationEditor::create();
		$config->removeComponentsByType('GridFieldAddExistingAutocompleter');
		$config->addComponent(new GridFieldSortableRows('SortOrder'));
		$config->addComponent(new GridFieldDeleteAction());
		$fields->addFieldToTab('Root.Main', new GridField(
			'TilesGrid',
			'Tiles',
			$this->Tiles(),
			$config
		));

		return $fields;
	}

	/**
	 * Returns the number of tiles inside of a row
	 *
	 * @return int
	*/
	public function Count()
	{
		return $this->Tiles()->Count();
	}
}
