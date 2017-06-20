<?php

namespace Fuel\Migrations;

class Create_details
{
	public function up()
	{
		\DBUtil::create_table('details', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'element_id' => array('constraint' => 11, 'type' => 'int'),
			'quantity_index' => array('constraint' => '5,2', 'type' => 'decimal'),
			'note' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('details');
	}
}
