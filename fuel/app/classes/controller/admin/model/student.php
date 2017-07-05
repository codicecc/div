<?php
class Controller_Admin_Model_Student extends Controller_Admin{
	
	public function action_test(){
		die();
		DB::delete()
			->table('models_students')
			->where('models_students.order_id',1)
			->where('models_students.model_id',5)
			->execute();
		echo 123;
		
	}	
	public function action_update_student_list(){
		if (Input::is_ajax()) {
			if(intval(Input::post('model_id'))>0&&
				intval(Input::post('order_id'))>0&&
				is_array(Input::post('astudentListSelected'))>0){
			
				// delete existing models_students relationships
				DB::delete()
					->table('models_students')
					->where('models_students.order_id',intval(Input::post('order_id')))
					->where('models_students.model_id',intval(Input::post('model_id')))
					->execute();

				// save models_students relationships passed								
				for($i=0;$i<count(Input::post('astudentListSelected'));$i++){
					$models_students = Model_Model_Student::forge(array(
						'model_id' => intval(Input::post('model_id')),
						'student_id' => Input::post('astudentListSelected')[$i],
						'order_id' => intval(Input::post('order_id')),
					));
				
					if ($models_students and $models_students->save()){
					}
				}
			}
			else{
				return 23;
			}
		}
		return false; // we return no content at all
	}
}
