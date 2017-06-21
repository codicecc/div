<?php
class Controller_Admin_Detail extends Controller_Admin{	
	
	public function action_index($element_id=null){
		
		$element_id=Input::post('element_id')?Input::post('element_id'):$element_id;
		if(isset($element_id)){
			$data['details'] = Model_Detail::query()
				->where('element_id',$element_id)
				->get();
		}
		else{
			$config = array(
				'pagination_url' => '/admin/detail',
				'total_items'    => Model_Detail::count(),
				'per_page'       => 100,
				'uri_segment'    => 'page',
			);
			
			// Create a pagination instance named 'mypagination'
			$pagination = Pagination::forge('mypagination', $config);
		  
			$data['details'] = Model_Detail::query()
				->order_by('created_at','desc')
				->rows_offset($pagination->offset)
				->rows_limit($pagination->per_page)
				->get();
			
			// we pass the object, it will be rendered when echo'd in the view
			$data['pagination'] = $pagination;
			
		}
		$this->template->title = "Details";
		$this->template->content = View::forge('admin/detail/index', $data);
	}

	public function action_view($id = null)
	{
		$data['detail'] = Model_Detail::find($id);

		$this->template->title = "Detail";
		$this->template->content = View::forge('admin/detail/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Detail::validate('create');

			if ($val->run())
			{
				$detail = Model_Detail::forge(array(
					'name' => Input::post('name'),
					'element_id' => Input::post('element_id'),
					'quantity_index' => Input::post('quantity_index'),
					'note' => Input::post('note'),
				));
				
				$checkUniquePair=uniquevaluerules::checkNameFk("details",
					array("Name","element_id"),
					array(Input::post('name'),Input::post('element_id')));
					
				if($checkUniquePair){
					Session::set_flash('error', e('Could not save same element.'));
				}
				else {
					if ($detail and $detail->save()){
						Session::set_flash('success', e('Added detail #'.$detail->id.'.'));
						Response::redirect('admin/detail');
					}
					else {
						Session::set_flash('error', e('Could not save detail.'));
					}
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Details";
		$this->template->content = View::forge('admin/detail/create');

	}

	public function action_edit($id = null)
	{
		$detail = Model_Detail::find($id);
		$val = Model_Detail::validate('edit');

		if ($val->run())
		{
			$detail->name = Input::post('name');
			$detail->element_id = Input::post('element_id');
			$detail->quantity_index = Input::post('quantity_index');
			$detail->note = Input::post('note');

			$checkUniquePair=uniquevaluerules::checkNameFk("details",
				array("Name","element_id"),
				array(Input::post('name'),Input::post('element_id')));
				
			if($checkUniquePair){
				Session::set_flash('error', e('Could not save same element.'));
			}
			else {
				if ($detail->save())
				{
					Session::set_flash('success', e('Updated detail #' . $id));

					Response::redirect('admin/detail');
				}

				else
				{
					Session::set_flash('error', e('Could not update detail #' . $id));
				}
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$detail->name = $val->validated('name');
				$detail->element_id = $val->validated('element_id');
				$detail->quantity_index = $val->validated('quantity_index');
				$detail->note = $val->validated('note');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('detail', $detail, false);
		}

		$this->template->title = "Details";
		$this->template->content = View::forge('admin/detail/edit');

	}

	public function action_delete($id = null)
	{
		if ($detail = Model_Detail::find($id))
		{
			$detail->delete();

			Session::set_flash('success', e('Deleted detail #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete detail #'.$id));
		}

		Response::redirect('admin/detail');

	}

}
