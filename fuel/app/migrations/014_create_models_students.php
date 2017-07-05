<?php

namespace Fuel\Migrations;

class Create_models_students
{
	public function up()
	{
		\DBUtil::create_table('models_students', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'model_id' => array('constraint' => 11, 'type' => 'int'),
			'student_id' => array('constraint' => 11, 'type' => 'int'),
			'order_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'));
		
		//Adding UNIQUE constraint to 'element_id' column and 'model_id' column 
		\DB::query("ALTER TABLE `models_students` ADD UNIQUE( `model_id`, `student_id`, `order_id`)")->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('models_students');
	}
}
