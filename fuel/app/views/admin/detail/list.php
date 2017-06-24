<ul id="detail_list" data-element_id="<?php echo $element->id; ?>">
<?php 
foreach (Model_detail::find('all') as $detail) {
?>
	<?php echo render('admin/detail/item', array('detail' => $detail,'element' => $element, 'model' => $model)); ?>
<?php
}
?>
</ul>
