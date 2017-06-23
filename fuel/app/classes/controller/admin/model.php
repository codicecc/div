<?php
class Controller_Admin_Model extends Controller_Admin{

	public function action_test(){
		$model=Model_Model::find(1);
		$model->elements[]=Model_Element::find(6);
		debug::dump($model->elements);
		
		echo"This is a test!";
		die();
	}
	
	public function action_index()
	{
		$data['models'] = Model_Model::find('all');
		$this->template->title = "Models";
		$this->template->content = View::forge('admin/model/index', $data);

	}

	public function action_view($id = null){


/*
$model=Model_Model::find(1);
$model->elements[]=Model_Element::find(6);
//unset($model->elements[6]);
$model->save();
		die();
*/

		$data['model'] = Model_Model::find($id);

		$this->template->title = "Model";
		$this->template->content = View::forge('admin/model/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Model::validate('create');

			if ($val->run())
			{
				$model = Model_Model::forge(array(
					'name' => Input::post('name'),
					'difficult_index' => Input::post('difficult_index'),
					'note' => Input::post('note'),
				));

				if ($model and $model->save())
				{
					Session::set_flash('success', e('Added model #'.$model->id.'.'));

					Response::redirect('admin/model');
				}

				else
				{
					Session::set_flash('error', e('Could not save model.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Models";
		$this->template->content = View::forge('admin/model/create');

	}

	public function action_edit($id = null) {
		
		
		$model = Model_Model::find($id);
		$val = Model_Model::validate('edit');
	
		if ($val->run()){
		
			$model->name = Input::post('name');
			$model->difficult_index = Input::post('difficult_index');
			$model->note = Input::post('note');

			if ($model->save())
			{
				Session::set_flash('success', e('Updated model #' . $id));

				Response::redirect('admin/model');
			}

			else
			{
				Session::set_flash('error', e('Could not update model #' . $id));
			}
		}
		else{
			if (Input::method() == 'POST'){
				$model->name = $val->validated('name');
				$model->difficult_index = $val->validated('difficult_index');
				$model->note = $val->validated('note');
				Session::set_flash('error', $val->error());
			}
			$this->template->set_global('model', $model, false);
		}
		$this->template->title = "Models";	
		$this->template->content = View::forge('admin/model/edit');
	}

	public function action_delete($id = null)
	{
		if ($model = Model_Model::find($id))
		{
			$model->delete();

			Session::set_flash('success', e('Deleted model #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete model #'.$id));
		}

		Response::redirect('admin/model');

	}

}
