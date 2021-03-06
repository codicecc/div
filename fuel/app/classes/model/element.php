<?php
class Model_Element extends \Orm\Model{
	
	protected static $_many_many = array(
		'models' => array(
			'key_from' => 'id',
			'key_through_from' => 'element_id',
			'model_to' => 'Model_Model',
			'key_to' => 'id',
			'key_through_to' => 'model_id',
			'table_through' => 'elements_models',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
    );
	
	protected static $_has_many = array('details' => array(
		'model_to' => 'Model_Detail',
		'key_from' => 'id',
		'key_to' => 'element_id',
		'cascade_save' => true,			
		'cascade_delete' => true,		
		)
	);

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
			->add_rule('unique', 'elements.name');
		//$val->add_field('name', 'Name', 'required|max_length[255]');
		//$val->add_field('note', 'Note', 'required');

		return $val;
	}
}
