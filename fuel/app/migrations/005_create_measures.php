<?php

namespace Fuel\Migrations;

class Create_measures
{
	public function up()
	{
		\DBUtil::create_table('measures', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'student_id' => array('constraint' => 11, 'type' => 'int'),
			'body_part_id' => array('constraint' => 11, 'type' => 'int'),
			'value' => array('constraint' => 255, 'type' => 'varchar'),
			'note' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('measures');
	}
}