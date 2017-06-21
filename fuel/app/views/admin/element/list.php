
<ul id="element_list" data-project_id="<?php echo $model->id; ?>">
<?php 
//foreach ($model->elements as $element) {
foreach (Model_Element::find('all') as $element) {
?>
	<?php echo render('admin/element/item', array('element' => $element)); ?>
<?php } ?>
</ul>
