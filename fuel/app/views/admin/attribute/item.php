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
	if($detail_model_id||0==0){
?>
			<input type="text"
				class="attribute"
				autocomplete="off"
				placeholder="Attribute"
				data-model_id="<?php echo $model->id;?>"
				data-detail_id="<?php echo $detail->id;?>"
				<?php if($detail_model_id){?>
				data-detail_model_id="<?php echo $detail_model_id;?>"
				<?php } ?>
				data-name="attribute_list_item"

			>
<?php
	}
?>
