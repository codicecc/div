<h2><?php echo __('admin.Viewing');?> #<?php echo $element->id; ?></h2>

<p>
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $element->name; ?></p>
<p>
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo $element->note; ?></p>

<?php echo render('admin/element/_actions'); ?>	
