<h2><?php echo __('admin.Viewing');?> #<?php echo $size->id; ?></h2>
<p>
	<strong><?php echo __('admin.BodyPart');?>:</strong>
	<?php echo $size->body_part->name; ?></p>
<p>
	<strong><?php echo __('admin.Min');?>:</strong>
	<?php echo $size->min; ?></p>
<p>
	<strong><?php echo __('admin.Max');?>:</strong>
	<?php echo $size->max; ?></p>
<p>
	<strong><?php echo __('admin.Reference');?>:</strong>
	<?php echo $size->reference; ?></p>

<?php echo render('admin/size/_actions'); ?>