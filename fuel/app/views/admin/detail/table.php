<table id="detail_list_<?php echo $element->id; ?>" data-element_id="<?php echo $element->id; ?>" data-name="detail_list" class="detail_table">
<?php 
$element_details=Model_detail::find('all', array (
			'where' => array(
				array('element_id',$element->id)
				)
			)
		);

foreach ($element_details as $detail) {

	if($readonly==1){
	foreach($model->details as $d){
			if($d->id==$detail->id)echo render('admin/detail/row', array('readonly' => $readonly,'detail' => $detail,'element' => $element, 'model' => $model));
		}
	}
}
?>
</table>
