<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label(__('admin.SKU'), 'sku', array('class'=>'control-label')); ?>
			<?php echo Form::input('sku', Input::post('sku', isset($model) ? $model->sku : "dv".intval(hmodel::get_model_last_id()+1000)), array('class' => 'col-md-4 form-control', 'placeholder'=>__('admin.SKU'))); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Name'), 'name', array('class'=>'control-label')); ?>
			<?php echo Form::input('name', Input::post('name', isset($model) ? $model->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>__('admin.Name'))); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.DifficultIndex'), 'difficult_index', array('class'=>'control-label')); ?>
				<?php echo Form::input('difficult_index', 
					Input::post('difficult_index', isset($model) ? $model->difficult_index : ''), 
					array('class' => 'col-md-4 form-control', 'placeholder'=>__('admin.DifficultIndex'))); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Note'), 'note', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('note', Input::post('note', isset($model) ? $model->note : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>__('admin.Note'))); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', __('admin.Save'), array('class' => 'btn btn-primary')); ?>
		
		</div>
		<div class="form-group">
				<?php echo Form::hidden('id', isset($model) ? $model->id : 0);?>
		</div>				
	
	</fieldset>
	
<?php echo Form::close(); ?>
