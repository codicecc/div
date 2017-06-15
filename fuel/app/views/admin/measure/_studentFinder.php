<?php echo Form::open(array("action" => "/admin/measure","class"=>"form-horizontal")); ?>
<div class="col-xs-3">
	<div class="form-group">
		<div class="panel panel-green">
			<div class="panel-heading">	
				<div class="col-xs-3">
					<div class="panel-heading">						
						<div class="row">
							<i class="fa fa-user fa-5x"></i>
						</div>
					</div>						
				</div>
				<div class="col-xs-9 text-right">
					<div class="panel-heading">	
						<div class="row">
							<?php echo __('admin.studentFinder');?>
							<?php echo Form::label(__('admin.Student'), 'student_id', array('class'=>'control-label')); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="panel-heading">	
						<div class="row">			
							<?php	
							$select_box = \Presenter::forge('admin/student/selectorwithschool');
							echo $select_box;	
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 text-center">
					<div class="row">						
					<?php echo Form::submit('submit', __('admin.Filter'), array('class' => 'btn btn-primary')); ?>
					<?php echo Html::anchor('admin/measure', __('admin.Reset'),array("class"=>"btn btn-info")); ?>
					</div>		
				</div>
			</div>	
		</div>	
	</div>
</div>	
<?php echo Form::close(); ?>
