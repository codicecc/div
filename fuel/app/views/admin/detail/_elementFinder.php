<?php echo Form::open(array("action" => "/admin/detail","class"=>"form-horizontal")); ?>
<div class="col-xs-12">
	<div class="form-group">
		<div class="panel panel-info">
			<div class="panel-heading">	
				<div class="col-xs-3">
					<div class="panel-heading">						
						<div class="row">
							<i class="fa fa-tag fa-5x"></i>
						</div>
					</div>						
				</div>
				<div class="col-xs-9 text-right">
					<div class="panel-heading">	
						<div class="row">
							<?php echo __('admin.elementFinder');?>
							<?php echo Form::label(__('admin.Element'), 'element_id', array('class'=>'control-label')); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="panel-heading">	
						<div class="row">			
							<?php	
							$select_box = \Presenter::forge('admin/element/selectorbydetail');
							echo $select_box;	
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 text-center">
					<div class="row">						
					<?php echo Form::submit('submit', __('admin.Filter'), array('class' => 'btn btn-primary')); ?>
					<?php echo Html::anchor('admin/detail', __('admin.Reset'),array("class"=>"btn btn-info")); ?>
					</div>		
				</div>
			</div>	
		</div>	
	</div>
</div>	
<?php echo Form::close(); ?>
