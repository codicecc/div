<?php

namespace Fuel\Migrations;

class Create_sizes
{
	public function up()
	{
		\DBUtil::create_table('sizes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'min' => array('constraint' => 255, 'type' => 'varchar'),
			'max' => array('constraint' => 255, 'type' => 'varchar'),
			'reference' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('sizes');
	}
}