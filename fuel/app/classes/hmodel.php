<?php
class hmodel{
	static function get_attribute($model_id,$detail_id,$what="id") {
		$Detail_Model=Model_Detail_Model::find('all',
					array('where' => array(
						array('model_id', '=', $model_id), 
						array('detail_id', '=', $detail_id)
					)
				)
			);
		$detail_model_id=0;
		foreach($Detail_Model as $values){
			$detail_model_id=$values->id;
		}
		
		$Attribute_Model=Model_Attribute::find('all',
					array('where' => array(
						array('detail_model_id', '=', $detail_model_id),
					)
				)
			);
		$result=0;
		foreach($Attribute_Model as $v){
			$result=$v->$what;
		}
		return $result;
	}
	static function set_attribute($model_id,$detail_id,$attribute_name){
		// Get Details_Models Id
		$Detail_Model=Model_Detail_Model::find('all',
				array('where' => array(
					array('model_id', '=', $model_id), 
					array('detail_id', '=', $detail_id)
				)
			)
		);
		foreach($Detail_Model as $values){
			$detail_model_id=$values->id;
		}
		
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
}
?>
