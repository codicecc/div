<ul id="element_list" data-name="element_list" data-model_id="<?php echo $model->id; ?>">
<?php 
foreach (Model_Element::find('all') as $element) {
?>
	<?php 
	if($readonly==1){
		foreach($element->models as $element_model ) {
			if($model->id==$element_model->id)echo render('admin/element/item', array('readonly' => $readonly, 'element' => $element, 'model' => $model)); 
		}
	}
	else{
		echo render('admin/element/item', array('readonly' => $readonly, 'element' => $element, 'model' => $model)); 
	}
	?>
<?php } ?>
</ul>
