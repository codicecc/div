<?php
class Controller_Admin_School extends Controller_Admin
{

	public function action_index()
	{
		$data['schools'] = Model_School::find('all');
		$this->template->title = "Schools";
		$this->template->content = View::forge('admin/school/index', $data);

	}

	public function action_view($id = null)
	{
		$data['school'] = Model_School::find($id);

		$this->template->title = "School";
		$this->template->content = View::forge('admin/school/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_School::validate('create');

			if ($val->run())
			{
				$school = Model_School::forge(array(
					'name' => Input::post('name'),
					'note' => Input::post('note'),
				));

				if ($school and $school->save())
				{
					Session::set_flash('success', e('Added school #'.$school->id.'.'));

					Response::redirect('admin/school');
				}

				else
				{
					Session::set_flash('error', e('Could not save school.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Schools";
		$this->template->content = View::forge('admin/school/create');

	}

	public function action_edit($id = null)
	{
		$school = Model_School::find($id);
		$val = Model_School::validate('edit');

		if ($val->run())
		{
			$school->name = Input::post('name');
			$school->note = Input::post('note');

			if ($school->save())
			{
				Session::set_flash('success', e('Updated school #' . $id));

				Response::redirect('admin/school');
			}

			else
			{
				Session::set_flash('error', e('Could not update school #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$school->name = $val->validated('name');
				$school->note = $val->validated('note');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('school', $school, false);
		}

		$this->template->title = "Schools";
		$this->template->content = View::forge('admin/school/edit');

	}

	public function action_delete($id = null)
	{
		if ($school = Model_School::find($id))
		{
			$school->delete();

			Session::set_flash('success', e('Deleted school #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete school #'.$id));
		}

		Response::redirect('admin/school');

	}

}
