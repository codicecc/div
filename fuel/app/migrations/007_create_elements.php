<?php

namespace Fuel\Migrations;

class Create_elements
{
	public function up()
	{
		\DBUtil::create_table('elements', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'note' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
		//Adding UNIQUE constraint to 'name' column 
		\DB::query("ALTER TABLE `elements` ADD UNIQUE( `name`)")->execute();

	}

	public function down()
	{
		\DBUtil::drop_table('elements');
	}
}
