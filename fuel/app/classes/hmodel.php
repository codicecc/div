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
}
?>
