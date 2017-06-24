<ul id="detail_list" data-element_id="<?php echo $element->id; ?>">
<?php 
$element_details=Model_detail::find('all', array (
			'where' => array(
				array('element_id',$element->id)
				)
			)
		);

foreach ($element_details as $detail) {
?>
	<?php echo render('admin/detail/item', array('detail' => $detail,'element' => $element, 'model' => $model)); ?>
<?php
}
?>
</ul>
