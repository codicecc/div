<?php
class Model_Model extends \Orm\Model{
	
	protected static $_has_many = array(
		'orders' => array(
			'model_to' => 'Model_Order',
			'key_from' => 'id',
			'key_to' => 'model_id',
			'cascade_save' => true,			
			'cascade_delete' => true,
		),
	);
	protected static $_many_many = array(
		'elements' => array(
			'key_from' => 'id',
			'key_through_from' => 'model_id',
			'model_to' => 'Model_Element',
			'key_to' => 'id',
			'key_through_to' => 'element_id',
			'table_through' => 'elements_models',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'details' => array(
			'key_from' => 'id',
			'key_through_from' => 'model_id',
			'model_to' => 'Model_Detail',
			'key_to' => 'id',
			'key_through_to' => 'detail_id',
			'table_through' => 'details_models',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'students' => array(
			'key_from' => 'id',
			'key_through_from' => 'model_id',
			'model_to' => 'Model_Student',
			'key_to' => 'id',
			'key_through_to' => 'student_id',
			'table_through' => 'models_students',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
    );
        
	protected static $_properties = array(
		'id',
		'sku',
		'name',
		'difficult_index',
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
		$val->add_field('sku', 'SKU', 'required|max_length[64]', array('trim', 'strip_tags', 'required', 'is_upper'))
			->add_rule('unique', 'models.sku');
		$val->add_field('name', 'Name', 'required|max_length[255]');		

		$val->add_field('difficult_index', 'Difficult Index', 'required');
		//$val->add_field('note', 'Note', 'required');

		return $val;
	}

}
