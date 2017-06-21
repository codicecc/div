
<ul id="element_list" data-project_id="<?php echo $model->id; ?>">
<?php 
foreach (Model_Element::find('all') as $element) {
?>
	<?php echo render('admin/element/item', array('element' => $element, 'model' => $model)); ?>
<?php } ?>
</ul>
