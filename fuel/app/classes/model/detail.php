<?php
class Model_Detail extends \Orm\Model{
	
	protected static $_belongs_to = array('element');
	
	protected static $_properties = array(
		'id',
		'name',
		'element_id',
		'quantity_index',
		'note',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory){
				
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('element_id', 'Element Id', 'required|valid_string[numeric]');
		$val->add_field('quantity_index', 'Quantity Index', 'required|valid_string[decimal]');
		//$val->add_field('note', 'Note', 'required');

		return $val;
	}

}
