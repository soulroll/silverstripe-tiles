<?php

class TilesPage extends Page
{

	/**
	 * Every tiles page has many tile rows
	 * @var array
	 */
	private static $has_many = array(
		'TileRows' => 'TileRow',
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$config = GridFieldConfig_RelationEditor::create();
		$config->removeComponentsByType('GridFieldAddExistingAutocompleter');
		$config->addComponent(new GridFieldSortableRows('SortOrder'));
		$config->addComponent(new GridFieldDeleteAction());

		$fields->addFieldToTab('Root.Tiles', new GridField(
			'TileRowsGrid',
			'Tile Rows',
			$this->TileRows(),
			$config
		));

		return $fields;
	}

	/**
	 * Returns the correct Bootstrap class for tiles on this page
	 * @param int $rowID
	 * @return string
	 */
	public function TilesClass($rowID)
	{
		$row = TileRow::get()->byId($rowID);

		if ($row) {
			$medium = (12 / $row->Tiles()->count());
			if ($medium < 6) {
				$medium = 6;
			}
			return 'col-sm-12 col-md-' . $medium . ' col-lg-' . (12 / $row->Tiles()->count());
		}

		return 'col-lg-12 col-md-12 col-sm-12';
	}
}

class TilesPage_Controller extends Page_Controller {
}
