<?php
class Controller_Admin_Size extends Controller_Admin
{

	public function action_index()
	{
		$data['sizes'] = Model_Size::find('all',array('order_by'=>array('created_at'=>'desc')));
		$this->template->title = "Sizes";
		$this->template->content = View::forge('admin/size/index', $data);

	}

	public function action_view($id = null)
	{
		$data['size'] = Model_Size::find($id);

		$this->template->title = "Size";
		$this->template->content = View::forge('admin/size/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Size::validate('create');

			if ($val->run())
			{
				$size = Model_Size::forge(array(
					'body_part_id' => Input::post('body_part_id'),
					'min' => Input::post('min'),
					'max' => Input::post('max'),
					'reference' => Input::post('reference'),
				));

				if ($size and $size->save())
				{
					Session::set_flash('success', e('Added size #'.$size->id.'.'));

					Response::redirect('admin/size');
				}

				else
				{
					Session::set_flash('error', e('Could not save size.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Sizes";
		$this->template->content = View::forge('admin/size/create');

	}

	public function action_edit($id = null)
	{
		$size = Model_Size::find($id);
		$val = Model_Size::validate('edit');

		if ($val->run())
		{
			$size->body_part_id = Input::post('body_part_id');
			$size->min = Input::post('min');
			$size->max = Input::post('max');
			$size->reference = Input::post('reference');

			if ($size->save())
			{
				Session::set_flash('success', e('Updated size #' . $id));

				Response::redirect('admin/size');
			}

			else
			{
				Session::set_flash('error', e('Could not update size #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$size->body_part_id = $val->validated('body_part_id');
				$size->min = $val->validated('min');
				$size->max = $val->validated('max');
				$size->reference = $val->validated('reference');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('size', $size, false);
		}

		$this->template->title = "Sizes";
		$this->template->content = View::forge('admin/size/edit');

	}

	public function action_delete($id = null)
	{
		if ($size = Model_Size::find($id))
		{
			$size->delete();

			Session::set_flash('success', e('Deleted size #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete size #'.$id));
		}

		Response::redirect('admin/size');

	}

}
