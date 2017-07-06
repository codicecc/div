<?php
class Controller_Admin_Model extends Controller_Admin{

	public function action_test(){

	}
	
	public function action_index()
	{
		$data['models'] = Model_Model::find('all',
							array(
								'order_by' => array('id' => 'desc'),
							)
						);
		$this->template->title = "Models";
		$this->template->content = View::forge('admin/model/index', $data);

	}

	public function action_clone($id=null){
				
		$model = Model_Model::query()
			->related('elements')
			->related('details')
			->where('id', '=', $id)
			->order_by('id', 'desc')		
			->get_one();
			
		$newModel = Model_Model::forge(array(
					'sku' => "CLONE ".$model->sku,
					'name' => $model->name,
					'difficult_index' => $model->difficult_index,
					'note' => $model->note,
				));
				
		if ($newModel and $newModel->save()){
			$this->relationshipClone($model,$newModel->id);
			Session::set_flash('success', e('Added model #'.$model->id.'.'));
			Response::redirect('admin/model');
			//die();
		}
	}
	private function relationshipClone($model,$newModelId){
		$newModel = Model_Model::find($newModelId);
		foreach($model->elements as $element){
			$newElement = Model_Element::find($element->id);
			$newModel->elements[]=$newElement;
		}
		foreach($model->details as $detail){
			$newDetail = Model_Detail::find($detail->id);
			$newModel->details[]=$newDetail;
		}
		$newModel->save();
		
		foreach($model->details as $detail){
			hmodel::set_attribute($newModelId,$detail->id,hmodel::get_attribute($model->id,$detail->id,"name"));
		}
	}

	public function action_view($id = null,$readonly=1){
		
		if(!isset($id)){
			Session::set_flash('error', e('Request is not valid!'));
			Response::redirect('admin/model');
		}

		$data['model'] = Model_Model::find($id);

		$this->template->title = "Model";
		
		$data['readonly']=1;
		//if(isset($readonly))$data['readonly']=1;
		$this->template->content = View::forge('admin/model/view', $data);

	}

	public function action_elements($id = null,$readonly=0){
		
		if(!isset($id)){
			Session::set_flash('error', e('Request is not valid!'));
			Response::redirect('admin/model');
		}

		$data['model'] = Model_Model::find($id);

		$this->template->title = "Model";
		
		$data['readonly']=0;
		//if(isset($readonly))$data['readonly']=1;
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
					'sku' => Input::post('sku'),
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
		
			$model->sku = Input::post('sku');
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
				$model->sku = $val->validated('sku');
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

	public function action_delete($id = null){
		
		if(horder::orderExsistingByModel($id)){
			Session::set_flash('error', e('Could not delete Model #'.$id.' there are Orders!'));
			Response::redirect('admin/model');
		}
		
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
	public function action_change_element_status(){
		if (Input::is_ajax()) {
			$model = Model_Model::find(intval(Input::post('model_id')));
			$element = Model_Element::find(intval(Input::post('element_id')));
			$status=intval(Input::post('status'));
			if($status){
				$model->elements[]=$element;
			}
			else{
				unset($model->elements[$element->id]);
				$element_details=Model_detail::find('all', array (
						'where' => array(
						array('element_id',$element->id)
						)
					)
				);
				foreach ($element_details as $detail) {
					if(hmodel::get_attribute($model->id,$detail->id))
						$this->attributeDelete($model->id,$detail->id);
					unset($model->details[$detail->id]);
				}
			}
			$model->save();
		}
		return false; // we return no content at all
	}
	public function action_change_detail_status(){
		if (Input::is_ajax()) {
			$model = Model_Model::find(intval(Input::post('model_id')));
			$detail = Model_Detail::find(intval(Input::post('detail_id')));
			$element = Model_Element::find($detail->element_id);
			$status=intval(Input::post('status'));
			if($status){
				$model->details[]=$detail;
				$model->elements[]=$element;
			}
			else{
				if(hmodel::get_attribute($model->id,$detail->id))
				$this->attributeDelete($model->id,$detail->id);
				unset($model->details[$detail->id]);
				
			}
			$model->save();
			//Response::redirect('admin/model/view/'.$model->id);
		}
		return false; // we return no content at all
	}
	private function attributeDelete($model_id,$detail_id){
		$Attribute_Model=Model_Attribute::find(hmodel::get_attribute($model_id,$detail_id));
		$Attribute_Model->delete();
	}
}
