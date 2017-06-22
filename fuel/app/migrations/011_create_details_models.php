<?php

namespace Fuel\Migrations;

class Create_details_models
{
	public function up()
	{
		\DBUtil::create_table('details_models', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'detail_id' => array('constraint' => 11, 'type' => 'int'),
			'model_id' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
		
		//Adding UNIQUE constraint to 'element_id' column and 'model_id' column 
		\DB::query("ALTER TABLE `details_models` ADD UNIQUE( `detail_id`, `model_id`)")->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('models');
	}
}
