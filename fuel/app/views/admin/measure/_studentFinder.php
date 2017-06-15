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
		<p>
		<?php echo Form::submit('submit', __('admin.Filter'), array('class' => 'btn btn-primary')); ?>
		<?php echo Html::anchor('admin/measure', __('admin.Reset'),array("class"=>"btn btn-info")); ?>
		</p>
	</label>
</div>	
</fieldset>
<?php echo Form::close(); ?>
</p>
