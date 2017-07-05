<?php

namespace Fuel\Migrations;

class Create_models
{
	public function up()
	{
		\DBUtil::create_table('models', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'sku' => array('constraint' => 64, 'type' => 'varchar'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'difficult_index' => array('constraint' => '5,2', 'type' => 'decimal'),
			'note' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'));
				
		//Adding UNIQUE constraint to 'sku' column 
		\DB::query("ALTER TABLE `models` ADD UNIQUE( `sku`)")->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('models');
	}
}
