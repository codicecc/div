<?php
class Controller_Admin_Measure extends Controller_Admin{

	private function upload(){
		if (Input::method() == 'POST'){
			if (!empty($_FILES["file"]["size"])){
				$config = array(
						'path' => DOCROOT.'files',
						'randomize' => true,
						'ext_whitelist' => array('csv'),
				);
				Upload::process($config);		
				// if there are any valid files
				if (Upload::is_valid()){
					foreach(Upload::get_files() as $file){
						$file_content = File::read(Upload::get_files()[0]["file"], true);
						$a_file_content=(Format::forge($file_content, 'csv')->to_array());
						//Actions on files
					}		
				}
				
				foreach (Upload::get_errors() as $file){
					// $file is an array with all file information,
					// $file['errors'] contains an array of all error occurred
					// each array element is an an array containing 'error' and 'message'
				}
				$this->process($a_file_content);
			}
			else{
				Session::set_flash('error', __('admin.NoFile'));
			}
		}	
	}
	private function process($a_file_content=null){
		$school_id=Input::post('school_id');
		if(!isset($school_id)){                  
			Session::set_flash('error', __('admin.NoSchoolSelected'));
			return 123;
		}
		if(isset($a_file_content)){
			// Get first Column Label of CSV file
			foreach($a_file_content[0] as $l2 => $v2){
				$firstColumnLabel=$l2;
				break;
			}
			$flashMsgERROR="";
			$flashMsgOK="";
			foreach($a_file_content as $label => $value){
				// For every CSV row check if Student of a school selected, exists
				$result=Model_student::query()
						->where('name','like',$value[$firstColumnLabel])
						->where('school_id',Input::post('school_id'))
						->get();
				foreach($result as $loopStudent){
					// checks if does student exsisted
					//if(isset($loopStudent->id)){
					//Debug::dump($loopStudent);
					if($loopStudent->id>0){						
						$flashMsgERROR.=$value[$firstColumnLabel]." - ".Model_School::find(Input::post('school_id'))->name."<br />";
						break 1;						
					}
				}
				if(empty($result)){
					// Create student
					$student=new Model_student();
					$student = Model_Student::forge(array(
						'name' => $value[$firstColumnLabel],
						'school_id' => Input::post('school_id'),
						'note' => 'Created by CSV'.date('ymdis'),
					));
					if ($student and $student->save()){
						$flashMsgOK.="<br />- ".$student->name . " - ".Model_School::find(Input::post('school_id'))->name;
						// Create measure
						foreach($value as $l => $v){
							$body_part_id=\DB::select('id')->from('body_parts')->where('name', 'LIKE', $l)->execute()->get('id', '0');
							if($body_part_id>0){
								$measure=new Model_measure();
								$measure= Model_Measure::forge(array(
									'student_id' => $student->id,
									'body_part_id' => $body_part_id,
									'value' => $v,
									'note' => 'Created by CSV'.date('ymdis'),
								));
								$measure->save();
							}
						}
					}
				}
			}
			if(strlen($flashMsgERROR)>0)Session::set_flash('error', $flashMsgERROR.__('admin.studentExists'));
			if(strlen($flashMsgOK)>0)Session::set_flash('success', __('admin.studentCreated').$flashMsgOK);
		}
	}
	
	public function action_index($student_id=null){
		
		$data['measures'] = Model_Measure::find('all');
		
		$student_id?Input::post('student_id'):$student_id;
		if(isset($student_id)){
			$data['measures'] = Model_Measure::query()
				->where('student_id',$student_id)
				->get();
		}
		else{
			$this->upload();
		}
		$this->template->title = "Measures";    
		$this->template->content = View::forge('admin/measure/index', $data);
	}

	public function action_view($id = null)	{
		$data['measure'] = Model_Measure::find($id);

		$this->template->title = "Measure";
		$this->template->content = View::forge('admin/measure/view', $data);

	}

	public function action_create()	{
		if (Input::method() == 'POST')
		{
			$val = Model_Measure::validate('create');

			if ($val->run())
			{
				$measure = Model_Measure::forge(array(
					'student_id' => Input::post('student_id'),
					'body_part_id' => Input::post('body_part_id'),
					'value' => Input::post('value'),
					'note' => Input::post('note'),
				));

				if ($measure and $measure->save())
				{
					Session::set_flash('success', e('Added measure #'.$measure->id.'.'));

					Response::redirect('admin/measure');
				}

				else
				{
					Session::set_flash('error', e('Could not save measure.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Measures";
		$this->template->content = View::forge('admin/measure/create');

	}

	public function action_edit($id = null)	{
		$measure = Model_Measure::find($id);
		$val = Model_Measure::validate('edit');

		if ($val->run())
		{
			$measure->student_id = Input::post('student_id');
			$measure->body_part_id = Input::post('body_part_id');
			$measure->value = Input::post('value');
			$measure->note = Input::post('note');

			if ($measure->save())
			{
				Session::set_flash('success', e('Updated measure #' . $id));

				Response::redirect('admin/measure');
			}

			else
			{
				Session::set_flash('error', e('Could not update measure #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$measure->student_id = $val->validated('student_id');
				$measure->body_part_id = $val->validated('body_part_id');
				$measure->value = $val->validated('value');
				$measure->note = $val->validated('note');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('measure', $measure, false);
		}

		$this->template->title = "Measures";
		$this->template->content = View::forge('admin/measure/edit');

	}

	public function action_delete($id = null)	{
		if ($measure = Model_Measure::find($id))
		{
			$measure->delete();

			Session::set_flash('success', e('Deleted measure #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete measure #'.$id));
		}

		Response::redirect('admin/measure');

	}

}
