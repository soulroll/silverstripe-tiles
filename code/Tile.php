<?php

class Tile extends DataObject
{

	/**
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Varchar(255)',
		'Description' => 'Text',
		'SortOrder' => 'Int',
	);

	/**
	 * Every tile has one tile row
	 * @var array
	 */
	private static $has_one = array(
		'DataObject' => 'TileRow',
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName('DataObjectID');
		$fields->removeByName('SortOrder');
		return $fields;
	}

}
