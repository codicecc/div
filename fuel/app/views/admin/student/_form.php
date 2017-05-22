<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label(__('admin.Name'), 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($student) ? $student->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.School'), 'school_id', array('class'=>'control-label')); ?>

			<div>
			<?php
			$select_box = \Presenter::forge('admin/school/selector');
			echo $select_box;
			?>
			</div>

		</div>
		<div class="form-group">
			<?php echo Form::label(__('admin.Note'), 'note', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('note', Input::post('note', isset($student) ? $student->note : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Note')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>