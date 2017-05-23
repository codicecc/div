<h2><?php echo __('admin.Viewing');?> #<?php echo $measure->id; ?></h2>

<p>
	<strong><?php echo __('admin.Student');?>:</strong>
	<?php echo $measure->student->name; ?></p>
<p>
	<strong><?php echo __('admin.BodyPart');?>:</strong>
	<?php echo $measure->body_part->name; ?></p>
<p>
	<strong><?php echo __('admin.Value');?>:</strong>
	<?php echo $measure->value; ?> cm</p>
<p>
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo $measure->note; ?></p>

<?php echo render('admin/measure/_actions'); ?>