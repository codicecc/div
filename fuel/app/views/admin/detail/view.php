<h2><?php echo __('admin.Viewing');?> #<?php echo $detail->id; ?></h2>

<p>
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $detail->name; ?></p>
<p>
	<strong><?php echo __('admin.Element');?>:</strong>
	<?php echo $detail->element->name; ?></p>
<p>
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo $detail->note; ?></p>

<?php echo render('admin/detail/_actions'); ?>	
