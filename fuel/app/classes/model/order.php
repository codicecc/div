<?php
class Model_Order extends \Orm\Model{
	
		
	protected static $_has_many = array('models_students' => array(
		'model_to' => 'Model_Model_Student',
		'key_from' => 'id',
		'key_to' => 'order_id',
		'cascade_save' => true,			
		'cascade_delete' => true,		
	));
	
	protected static $_properties = array(
		'id',
		'name',
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
		
		$val->add_callable('Hvalidation');
		$val->add_field('name', 'Name', 'required|max_length[255]', array('trim', 'strip_tags', 'required', 'is_upper'))
			->add_rule('unique', 'orders.name');

		return $val;
	}

}
