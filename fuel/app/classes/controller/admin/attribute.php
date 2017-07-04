<?php
class Controller_Admin_Attribute extends Controller_Admin{

	public function action_test(){

	}
	
	public function action_save(){
		if (Input::is_ajax()) {
			if(intval(Input::post('model_id')==0)) return 11;
			if(intval(Input::post('detail_id')==0)) return 12;
			if(empty(trim(Input::post('name')))) return 13;
			
			$model_id=intval(Input::post('model_id'));
			$detail_id=intval(Input::post('detail_id'));
			$attribute_name=Input::post('name');
			
			hmodel::set_attribute($model_id,$detail_id,$attribute_name);
		}
		return false; // we return no content at all
	}
}
