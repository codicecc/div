<?php
class Model_Measure extends \Orm\Model{
	
	protected static $_belongs_to = array('student','body_part');
	
	protected static $_properties = array(
		'id',
		'student_id',
		'body_part_id',
		'value',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('student_id', 'Student Id', 'required|valid_string[numeric]');
		$val->add_field('body_part_id', 'Body Part Id', 'required|valid_string[decimal]');
		$val->add_field('value', 'Value', 'required|valid_decimal[5,2]');
		//$val->add_field('note', 'Note', 'required');
		return $val;
	}

}
