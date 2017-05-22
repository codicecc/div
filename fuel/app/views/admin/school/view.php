<h2><?php echo __('admin.Viewing');?> #<?php echo $school->id; ?></h2>

<p>
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $school->name; ?></p>
<p>
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo $school->note; ?></p>

<?php echo render('admin/school/_actions'); ?>