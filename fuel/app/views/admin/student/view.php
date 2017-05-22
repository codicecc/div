<h2><?php echo __('admin.Viewing');?> #<?php echo $student->id; ?></h2>

<p>
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $student->name; ?></p>
<p>
	<strong><?php echo __('admin.School');?>:</strong>
	<?php echo $student->school->name; ?></p>
<p>
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo $student->note; ?></p>

<?php echo render('admin/student/_actions'); ?>	