<?php

namespace Fuel\Migrations;

class Create_attributes
{
	public function up()
	{
		\DBUtil::create_table('attributes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'detail_model_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
		
		//Adding UNIQUE constraint to 'name' column and 'detail_model_id' column 
		\DB::query("ALTER TABLE `attributes` ADD UNIQUE( `name`, `detail_model_id`)")->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('attributes');
	}
}
