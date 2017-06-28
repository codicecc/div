<h2><?php echo __('admin.Viewing');?> #<?php echo $model->id; ?></h2>

<p>
	<strong><?php echo __('admin.SKU');?>:</strong>
	<?php echo $model->sku; ?></p>
<p>
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $model->name; ?></p>

<p>	
	<strong><?php echo __('admin.ElementSelecting');?>:</strong>
	<?php echo render('admin/element/list', array('model' => $model)); ?>
</p>
	
<p>
	<strong><?php echo __('admin.DifficultIndex');?>:</strong>
	<?php echo $model->difficult_index; ?></p>
<p>
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo $model->note; ?></p>

<?php echo render('admin/model/_actions'); ?>	
