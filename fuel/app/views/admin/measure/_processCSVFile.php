<p>
<?php echo Form::open(array("class"=>"form-horizontal",'enctype' => 'multipart/form-data')); ?>
<fieldset>
<div class="form-group">
	<label class="btn btn-default btn-file">
		<?php echo __('admin.processCSVFile');?><br /> 
		<?php echo Form::label(__('admin.School'), 'school_id', array('class'=>'control-label')); ?>
		<?php	$select_box = \Presenter::forge('admin/school/selector');	echo $select_box;	?><br />
		<?php echo __('admin.BrowseForCSVFile');?> <input type="file" name="file" style="/*display: none;*/"><br />
		<?php echo Form::submit('submit', __('admin.Process'), array('class' => 'btn btn-primary')); ?>
	</label>
</fieldset>
<?php echo Form::close(); ?>
</p>
