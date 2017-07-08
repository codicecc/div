<?php
class Model_Student extends \Orm\Model{
	
	protected static $_belongs_to = array('school');
	protected static $_has_many = array(
		'measures' => array(
			'model_to' => 'Model_Measure',
			'key_from' => 'id',
			'key_to' => 'student_id',
			'cascade_save' => true,			
			'cascade_delete' => true,		
		)
	);
	protected static $_many_many = array(
		'models' => array(
			'key_from' => 'id',
			'key_through_from' => 'student_id',
			'model_to' => 'Model_Student',
			'key_to' => 'id',
			'key_through_to' => 'model_id',
			'table_through' => 'models_students',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);
	
	protected static $_properties = array(
		'id',
		'name',
		'school_id',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('school_id', 'School Id', 'required|valid_string[numeric]');
		//$val->add_field('note', 'Note', 'required');
		return $val;
	}

}
