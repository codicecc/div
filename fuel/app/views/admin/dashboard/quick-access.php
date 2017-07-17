<div class="row">
	<?php if(Auth::has_access('Controller_Admin_Measure.upload')):?>	
	<div class="col-lg-6 col-md-6">
		<div class="panel">
			<a href="/admin/measure" class="btn btn btn-info btn-lg btn-block" role="button"><?php echo __('admin.loadCSVFile');?></a>
		</div>
	</div>
	<?php endif;?>
	<?php if(Auth::has_access('Controller_Admin_Report.index')):?>	
	<div class="col-lg-6 col-md-6">
		<div class="panel">
			<a href="/admin/report" class="btn btn btn-info btn-lg btn-block" role="button"><?php echo __('admin.makeReport');?></a>
		</div>
	</div>
	<?php endif;?>
</div>
