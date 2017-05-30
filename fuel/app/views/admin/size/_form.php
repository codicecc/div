<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label(__('admin.BodyPart'), 'body_part_id', array('class'=>'control-label')); ?>

			<?php
			$select_box = \Presenter::forge('admin/body/part/sizeselector');
			echo $select_box;
			?>				

		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Min'), 'min', array('class'=>'control-label')); ?>

				<?php echo Form::input('min', Input::post('min', isset($size) ? $size->min : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Min')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Max'), 'max', array('class'=>'control-label')); ?>

				<?php echo Form::input('max', Input::post('max', isset($size) ? $size->max : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Max')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Reference'), 'reference', array('class'=>'control-label')); ?>

				<?php echo Form::input('reference', Input::post('reference', isset($size) ? $size->reference : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Reference')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', __('admin.Save'), array('class' => 'btn btn-primary')); ?>		</div>			
	</fieldset>
<?php echo Form::close(); ?>