<?php
$Detail_Model=Model_Detail_Model::find('all',
			array('where' => array(
				array('model_id', '=', $model->id), 
				array('detail_id', '=', $detail->id)
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
$name="";
foreach($Attribute_Model as $values){
	$name=$values->name;
}
?>
		<?php echo $name;?>
