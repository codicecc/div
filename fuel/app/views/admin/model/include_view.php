<p>
	<hr />

	<strong><?php echo __('admin.SKU');?>:</strong>
	<?php echo $model->sku; ?>
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $model->name; ?>
	<i data-id="order-model-toggle" class="order-model-toggle fa fa-ellipsis-v fa-fw"></i>
	<br />	
	<div data-id="order-model">
		<strong><?php echo __('admin.ElementSelecting');?>:</strong>
		<?php echo render('admin/element/table', array('readonly' => $readonly, 'model' => $model)); ?>
	</div>
	<br />
	<strong><?php echo __('admin.DifficultIndex');?>:</strong>
	<?php echo $model->difficult_index; ?>
	<br />
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo empty($model->note)?' - ':$model->note; ?>
	
	<hr />
</p>


