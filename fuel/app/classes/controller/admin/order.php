<?php
class Controller_Admin_Order extends Controller_Admin
{

	public function action_test(){
		//Adding new Order
		$order = Model_Order::forge(array(
					'name' => "Ordine di Test ".time(),
					'note' => "Note",
				));
		/*
		if ($order and $order->save()){
			echo "<i>#".$order->id." - ".$order->name." created!</i>";
		}
		*/
		
		$models_students = Model_Model_Student::forge(array(
				'model_id' => 71,
				'student_id' => 112,
				'order_id' => 7,
			));
		
		if ($models_students and $models_students->save()){
			echo "<i>#".$models_students->id." - created!</i>";
			echo "<br />";						
		}
		die();
	}
	
	public function action_index()
	{
		$data['orders'] = Model_Order::find('all');
		$this->template->title = "Orders";
		$this->template->content = View::forge('admin/order/index', $data);

	}

	public function action_students($id = null){
		if(!isset($id)){
			Session::set_flash('error', e('Request is not valid!'));
			Response::redirect('admin/order');
		}

		$data['order'] = Model_Order::find($id);

		$data['students'] = DB::select('id','name')
								->from('students')
								->where('school_id',$data['order']->school_id)
								 ->execute()
								 ->as_array('id','name')
								;
										
		$data['selected'] = DB::select('student_id')
								->from('models_students')
								->where('models_students.order_id',$data['order']->id)
								->where('models_students.model_id',$data['order']->model_id)
								->execute()
								->as_array('student_id')
								;
		$aselected=array();
		foreach($data['selected'] as $selected){
			array_push($aselected,$selected["student_id"]);
		}
		
		$data['selected']=$aselected;						 
		$data['student_selector']=1;
		$this->template->title = "Order";
		$this->template->content = View::forge('admin/order/view', $data);

	}

	public function action_view($id = null){
		if(!isset($id)){
			Session::set_flash('error', e('Request is not valid!'));
			Response::redirect('admin/order');
		}

		$data['order'] = Model_Order::find($id);
		$data['selected'] = DB::select('student_id')
								->from('models_students')
								->where('models_students.order_id',$data['order']->id)
								->where('models_students.model_id',$data['order']->model_id)
								->execute()
								->as_array('student_id')
								;
		$data['student_selector']=0;
		$data['students']=0;
		$this->template->title = "Order";
		$this->template->content = View::forge('admin/order/view', $data);
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Order::validate('create');

			if ($val->run())
			{
				$order = Model_Order::forge(array(
					'name' => Input::post('name'),
					'model_id' => Input::post('model_id'),
					'school_id' => Input::post('school_id'),										
					'note' => Input::post('note'),
					'closed' => Input::post('closed'),										
				));

				if ($order and $order->save())
				{
					Session::set_flash('success', e('Added order #'.$order->id.'.'));

					Response::redirect('admin/order');
				}

				else
				{
					Session::set_flash('error', e('Could not save order.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Orders";
		$this->template->content = View::forge('admin/order/create');

	}

	public function action_edit($id = null)
	{
		$order = Model_Order::find($id);
		$val = Model_Order::validate('edit');

		if ($val->run())
		{
			$order->name = Input::post('name');
			$order->model_id = Input::post('model_id');
			$order->school_id = Input::post('school_id');
			$order->note = Input::post('note');
			$order->closed = Input::post('closed');

			if ($order->save())
			{
				Session::set_flash('success', e('Updated order #' . $id));

				Response::redirect('admin/order');
			}

			else
			{
				Session::set_flash('error', e('Could not update order #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$order->name = $val->validated('name');
				$order->note = $val->validated('note');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('order', $order, false);
		}

		$this->template->title = "Orders";
		$this->template->content = View::forge('admin/order/edit');

	}

	public function action_delete($id = null)
	{
		if ($order = Model_Order::find($id))
		{
			$order->delete();

			Session::set_flash('success', e('Deleted order #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete order #'.$id));
		}

		Response::redirect('admin/order');

	}

}
