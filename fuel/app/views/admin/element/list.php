<ul id="element_list" data-name="element_list" data-model_id="<?php echo $model->id; ?>">
<?php 
foreach (Model_Element::find('all') as $element) {
?>
	<?php echo render('admin/element/item', array('element' => $element, 'model' => $model)); ?>
<?php } ?>
</ul>
