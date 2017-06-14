<p>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<fieldset>
<div class="form-group">
	<label class="btn btn-default btn-file">
		<?php echo __('admin.studentFinder');?><br /> 
		<?php echo Form::label(__('admin.Student'), 'student_id', array('class'=>'control-label')); ?>
		<?php	
			$select_box = \Presenter::forge('admin/student/selectorwithschool');
			echo $select_box;	
		?>
		<?php echo Form::submit('submit', __('admin.Filter'), array('class' => 'btn btn-primary')); ?>
	</label>
</fieldset>
<?php echo Form::close(); ?>
</p>
