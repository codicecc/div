<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label(__('admin.Student'), 'student_id', array('class'=>'control-label')); ?>

			<?php
			$select_box = \Presenter::forge('admin/student/selector');
			echo $select_box;
			?>				

		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Body_part'), 'body_part_id', array('class'=>'control-label')); ?>

			<?php
			$select_box = \Presenter::forge('admin/body/part/selector');
			echo $select_box;
			?>

		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Value'), 'value', array('class'=>'control-label')); ?>	

				<?php echo Form::input('value', Input::post('value', isset($measure) ? $measure->value : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Value')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Note'), 'note', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('note', Input::post('note', isset($measure) ? $measure->note : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Note')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', __('admin.Save'), array('class' => 'btn btn-primary')); ?>		</div>			
	</fieldset>
<?php echo Form::close(); ?>