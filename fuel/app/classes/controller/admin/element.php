<?php
class Controller_Admin_Element extends Controller_Admin
{

	public function action_index()
	{
		$data['elements'] = Model_Element::find('all');
		$this->template->title = "Elements";
		$this->template->content = View::forge('admin/element/index', $data);

	}

	public function action_view($id = null)
	{
		$data['element'] = Model_Element::find($id);

		$this->template->title = "Element";
		$this->template->content = View::forge('admin/element/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Element::validate('create');

			if ($val->run())
			{
				$element = Model_Element::forge(array(
					'name' => Input::post('name'),
					'note' => Input::post('note'),
				));

				if ($element and $element->save())
				{
					Session::set_flash('success', e('Added element #'.$element->id.'.'));

					Response::redirect('admin/element');
				}

				else
				{
					Session::set_flash('error', e('Could not save element.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Elements";
		$this->template->content = View::forge('admin/element/create');

	}

	public function action_edit($id = null)
	{
		$element = Model_Element::find($id);
		$val = Model_Element::validate('edit');

		if ($val->run())
		{
			$element->name = Input::post('name');
			$element->note = Input::post('note');

			if ($element->save())
			{
				Session::set_flash('success', e('Updated element #' . $id));

				Response::redirect('admin/element');
			}

			else
			{
				Session::set_flash('error', e('Could not update element #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$element->name = $val->validated('name');
				$element->note = $val->validated('note');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('element', $element, false);
		}

		$this->template->title = "Elements";
		$this->template->content = View::forge('admin/element/edit');

	}

	public function action_delete($id = null)
	{
		if ($element = Model_Element::find($id))
		{
			$element->delete();

			Session::set_flash('success', e('Deleted element #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete element #'.$id));
		}

		Response::redirect('admin/element');

	}

}
