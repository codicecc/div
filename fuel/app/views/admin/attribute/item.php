<?php
/*
Debug::dump($model->id);
Debug::dump($detail->id);
*/
$detail_model_object=DB::select('*')->from("details_models")
	->where('model_id',$model->id)
	->where('detail_id',$detail->id)
	->as_object('Model_Detail_Model')
	->execute();
	
	$detail_model_id=$detail_model_object[0]["id"];
	if($detail_model_id){
?>
			<input type="text"
				class="attribute"
				autocomplete="off"
				placeholder="Attribute"
			>
<?php
	}
?>
