<?php
class Model_Size extends \Orm\Model{
	
	protected static $_belongs_to = array('body_part');

	protected static $_properties = array(
		'id',
		'min',
		'max',
		'reference',
		'body_part_id',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('min', 'Min', 'required|valid_string[decimal]');
		$val->add_field('max', 'Max', 'required|valid_string[decimal]');
		$val->add_field('reference', 'Reference', 'required|max_length[255]');
		$val->add_field('body_part_id', 'Body Part Id', 'required|valid_string[numeric]');

		return $val;
	}

}
