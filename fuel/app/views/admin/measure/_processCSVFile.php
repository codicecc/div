<?php echo Form::open(array("class"=>"form-horizontal",'enctype' => 'multipart/form-data')); ?>
<div class="col-xs-12">
	<div class="form-group">
		<div class="panel panel-white">
			<div class="panel-heading">	
				<div class="col-xs-3">
					<div class="panel-heading">						
						<div class="row">
							<i class="fa fa-file-excel-o fa-5x"></i>
						</div>
					</div>						
				</div>
				<div class="col-xs-9 text-right">
					<div class="panel-heading">	
						<div class="row">
							<?php echo __('admin.processCSVFile');?><br /> 
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="panel-heading">	
						<div class="row">			
							<?php echo Form::label(__('admin.School'), 'school_id', array('class'=>'control-label')); ?>
							<?php	
								$select_box = \Presenter::forge('admin/school/measureselector');
								echo $select_box;	
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 text-center">
					<div class="row">						
						<?php echo __('admin.BrowseForCSVFile');?> <input type="file" name="file" style="/*display: none;*/"><br />
						<?php echo Form::submit('submit', __('admin.Process'), array('class' => 'btn btn-primary')); ?>
					</div>		
				</div>
			</div>	
		</div>	
	</div>
</div>	
<?php echo Form::close(); ?>
