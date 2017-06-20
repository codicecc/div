<?php
class Controller_Admin_Student extends Controller_Admin
{

	public function action_index()
	{
		$data['students'] = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = View::forge('admin/student/index', $data);

	}

	public function action_view($id = null)
	{
		$data['student'] = Model_Student::find($id);

		$this->template->title = "Student";
		$this->template->content = View::forge('admin/student/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Student::validate('create');

			if ($val->run())
			{
				$student = Model_Student::forge(array(
					'name' => Input::post('name'),
					'school_id' => Input::post('school_id'),
					'note' => Input::post('note'),
				));
				
				$checkUniquePair=uniquevaluerules::checkNameFk("students",
					array("name","school_id"),
					array(Input::post('name'),Input::post('school_id')));
					
				if($checkUniquePair){
					Session::set_flash('error', e('Could not save same element.'));
				}
				else {

					if ($student and $student->save()){
						Session::set_flash('success', e('Added student #'.$student->id.'.'));

						Response::redirect('admin/student');
					}

					else
					{
						Session::set_flash('error', e('Could not save student.'));
					}
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Students";
		$this->template->content = View::forge('admin/student/create');

	}

	public function action_edit($id = null)
	{
		$student = Model_Student::find($id);
		$val = Model_Student::validate('edit');

		if ($val->run())
		{
			$student->name = Input::post('name');
			$student->school_id = Input::post('school_id');
			$student->note = Input::post('note');

			$checkUniquePair=uniquevaluerules::checkNameFk("students",
				array("name","school_id"),
				array(Input::post('name'),Input::post('school_id')));
				
			if($checkUniquePair){
				Session::set_flash('error', e('Could not save same element.'));
			}
			else{
				if ($student->save())
				{
					Session::set_flash('success', e('Updated student #' . $id));

					Response::redirect('admin/student');
				}

				else
				{
					Session::set_flash('error', e('Could not update student #' . $id));
				}
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$student->name = $val->validated('name');
				$student->school_id = $val->validated('school_id');
				$student->note = $val->validated('note');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('student', $student, false);
		}

		$this->template->title = "Students";
		$this->template->content = View::forge('admin/student/edit');

	}

	public function action_delete($id = null)
	{
		if ($student = Model_Student::find($id))
		{
			$student->delete();

			Session::set_flash('success', e('Deleted student #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete student #'.$id));
		}

		Response::redirect('admin/student');

	}

}
