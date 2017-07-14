<?php
class Controller_Admin_Report extends Controller_Admin
{
	
	public function action_test(){
	}
	
	public function action_index(){
		
		$data[]=array();
		$this->template->title = "Reports";
		$this->template->content = View::forge('admin/report/index', $data);

	}
	
	public function action_full(){

		$data['body_parts']=(object)array();
		$data['report']=(object)array('filter'=>(object)array(
							'body_parts' => 0
							));
		$this->template->title = "Reports";
		$this->template->content = View::forge('admin/report/full', $data);

	}

	public function action_filter(){
		
		$data['report']=(object)array('filter'=>(object)array(
							'body_parts' => 1
							));

		$data['body_parts'] = DB::select('name','name')
						->from('body_parts')
						->order_by('rank')
						->execute()
						->as_array('name','name')
						;
		
		$this->template->title = "Reports";
		$this->template->content = View::forge('admin/report/full', $data);

	}
	
	public function action_getcsv(){
		
		if (Input::method() == 'POST')
		{
			$order_id=intval(Input::post('order_id'));
			$post_body_parts=Input::post('body_parts');
		}

		$filename="";
		
		$order=Model_Order::find($order_id);
		$school_name=$order->school->name;
		$model_name=$order->model->name;
			
		// File Name	
		$filename="Ordine - ".$model_name. " - ".$school_name;
		$query="
			SELECT id, model_id, student_id FROM `models_students`
			where order_id=".$order_id."
		";
		
		// Relationship between Models and Students
		$model_students=Model_Model_Student::find('all', array(
				'where' => array(
					array('order_id' => $order_id),
				),
			));	
			
		$data=array();
		
		foreach($model_students as $model_student){
			// Student's measures group by body parts
			$query="
				SELECT 
					(SELECT name from students WHERE students.id=measures.student_id) as student,
					(SELECT name from body_parts WHERE measures.body_part_id=body_parts.id) as body_part,
					measures.value 
				FROM `measures`,body_parts 
				WHERE measures.body_part_id=body_parts.id
				and measures.student_id=$model_student->student_id
				order BY body_parts.rank
			";
			
			$measures = DB::query($query)
			->execute()
			->as_array();
			
			// Get student's name			
			$students=Model_Student::find('all', array(
					'where' => array('id' => $model_student->student_id),
				));
				
			foreach($students as $student){
				$student_name=$student->name;
			}
			$data0=array($student_name);
			
			$str="";
			foreach($measures as $measure){
				// Is it filtered for body parts?
				if(is_array($post_body_parts)){
					if(in_array($measure["body_part"],$post_body_parts)){
						$data0[$measure["body_part"]]= $measure["value"];						
					}
				}
				else{
					$data0[$measure["body_part"]]= $measure["value"];
				}
			}
			
			array_push($data, $data0);
			$data0=array();
		}
		
		$field_array=array('Nome e Cognome');
		$body_parts=Model_Body_Part::find('all', array('order_by' => array('rank' => 'asc')));
		
		foreach($body_parts as $body_part){
			$field_array[]=$body_part->name;
		}
		
		if(is_array($post_body_parts)){
			array_unshift($post_body_parts,"Nome e Cognome");
			$field_array=$post_body_parts;
		}
		
		// CSV Response
		return $this->responsecsv($data,$field_array,$filename);
	}
	
	public function responsecsv($data,$field_array,$filename){
		
		$csv_data = Format::forge($data)->to_csv(null, null, true, $field_array);
		
		$response = new Response($csv_data,200);
		$response->set_header('Content-Type','application/csv');
		$response->set_header('Content-Disposition','attachment; filename="'.$filename.'-'.date('YmdHi').'.csv"');
		$response->set_header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate');
		$response->set_header('Expires','Mon, 26 Jul 1997 05:00:00 GMT');
		$response->set_header('Pragma','no-cache');
		
		return $response;
	}

}
