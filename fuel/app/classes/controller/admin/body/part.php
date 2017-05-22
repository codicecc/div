<?php
class Controller_Admin_Body_Part extends Controller_Admin
{

	public function action_index()
	{
		$data['body_parts'] = Model_Body_Part::find('all');
		$this->template->title = "Body_parts";
		$this->template->content = View::forge('admin/body/part/index', $data);

	}

	public function action_view($id = null)
	{
		$data['body_part'] = Model_Body_Part::find($id);

		$this->template->title = "Body_part";
		$this->template->content = View::forge('admin/body/part/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Body_Part::validate('create');

			if ($val->run())
			{
				$body_part = Model_Body_Part::forge(array(
					'name' => Input::post('name'),
				));

				if ($body_part and $body_part->save())
				{
					Session::set_flash('success', e('Added body_part #'.$body_part->id.'.'));

					Response::redirect('admin/body/part');
				}

				else
				{
					Session::set_flash('error', e('Could not save body_part.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Body_Parts";
		$this->template->content = View::forge('admin/body/part/create');

	}

	public function action_edit($id = null)
	{
		$body_part = Model_Body_Part::find($id);
		$val = Model_Body_Part::validate('edit');

		if ($val->run())
		{
			$body_part->name = Input::post('name');

			if ($body_part->save())
			{
				Session::set_flash('success', e('Updated body_part #' . $id));

				Response::redirect('admin/body/part');
			}

			else
			{
				Session::set_flash('error', e('Could not update body_part #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$body_part->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('body_part', $body_part, false);
		}

		$this->template->title = "Body_parts";
		$this->template->content = View::forge('admin/body/part/edit');

	}

	public function action_delete($id = null)
	{
		if ($body_part = Model_Body_Part::find($id))
		{
			$body_part->delete();

			Session::set_flash('success', e('Deleted body_part #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete body_part #'.$id));
		}

		Response::redirect('admin/body/part');

	}

}
