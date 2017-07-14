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
		
		if (Input::method() == 'POST')
		{
			$order_id=intval(Input::post('order_id'));
			if($order_id>0)
			{
				Response::redirect('/admin/report/getcsv/'.$order_id);
			}
		}

		$data[]=array();
		$this->template->title = "Reports";
		$this->template->content = View::forge('admin/report/full', $data);

	}
	
	public function action_getcsv($order_id = null){
		
		$filename="";
		
		$order=Model_Order::find($order_id);
		$school_name=$order->school->name;
		$model_name=$order->model->name;
				
		$filename="Ordine - ".$model_name. " - ".$school_name;
		$query="
			SELECT id, model_id, student_id FROM `models_students`
			where order_id=".$order_id."
		";
		
		$model_students=Model_Model_Student::find('all', array(
				'where' => array(
					array('order_id' => $order_id),
				),
			));	
		
		$data=array();
		
		foreach($model_students as $model_student){
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
						
			$students=Model_Student::find('all', array(
					'where' => array('id' => $model_student->student_id),
				));
				
			foreach($students as $student){
				$student_name=$student->name;
			}
			$data0=array($student_name);
			
			$str="";
			foreach($measures as $measure){
				$data0[$measure["body_part"]]= $measure["value"];
			}
			array_push($data, $data0);
			$data0=array();
		}
		
		$field_array=array('Nome e Cognome');
		$body_parts=Model_Body_Part::find('all', array('order_by' => array('rank' => 'asc')));
		foreach($body_parts as $body_part){
			$field_array[]=$body_part->name;
		}

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
