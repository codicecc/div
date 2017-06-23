<?php
class Model_Detail_Model extends \Orm\Model{
	
	protected static $_table_name = 'details_models';
	
	// in a Model_Detail_Model which has one attribute
	protected static $_has_one = array(
		'attribute' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Attribute',
			'key_to' => 'detail_model_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		)
	);

	protected static $_properties = array(
		'id',
		'detail_id',
		'model_id',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
		),
		'Orm\Observer_UpdatedAt' => array(
		),
	);
}
