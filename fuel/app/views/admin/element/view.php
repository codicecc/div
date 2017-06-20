<h2>Viewing #<?php echo $element->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $element->name; ?></p>
<p>
	<strong>Note:</strong>
	<?php echo $element->note; ?></p>

<?php echo Html::anchor('admin/element/edit/'.$element->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/element', 'Back'); ?>