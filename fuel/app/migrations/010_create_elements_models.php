<?php

namespace Fuel\Migrations;

class Create_elements_models
{
	public function up()
	{
		\DBUtil::create_table('elements_models', array(
			'element_id' => array('constraint' => 11, 'type' => 'int'),
			'model_id' => array('constraint' => 11, 'type' => 'int'),
		), array('element_id','model_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('elements_models');
	}
}
