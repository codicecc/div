<?php
class Controller_Admin_Attribute extends Controller_Admin{

	public function action_test(){

	}
	
	public function action_save(){
		if (Input::is_ajax()) {
			// Get Details_Models Id
			$Detail_Model=Model_Detail_Model::find('all',
					array('where' => array(
						array('model_id', '=', intval(Input::post('model_id'))), 
						array('detail_id', '=', intval(Input::post('detail_id')))
					)
				)
			);
			foreach($Detail_Model as $values){
				$detail_model_id=$values->id;
			}
		
			$attribute_name=Input::post('name');
			
			$Detail_Model=Model_Detail_Model::find($detail_model_id); 		
			$attribute=DB::select('id')->from("attributes")->where('detail_model_id', '=', $Detail_Model->id)->execute();
			if(count($attribute)>0){
				$Detail_Model->attribute=Model_Attribute::find($attribute[0]["id"]);
			}
			else{
				$Detail_Model->attribute=new Model_Attribute();
			}
			$Detail_Model->attribute->name=$attribute_name;
			$Detail_Model->save();
		}
		return false; // we return no content at all
	}
}
