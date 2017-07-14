<?php if(Auth::has_access(Request::active()->controller.'.full')):?>
	<?php echo Html::anchor('admin/report/full',__('admin.Full'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>
<?php if(Auth::has_access(Request::active()->controller.'.filter')):?>
	<?php echo Html::anchor('admin/report/filter',__('admin.Filter'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>
<?php if(Auth::has_access(Request::active()->controller.'.box')):?>
	<?php echo Html::anchor('admin/report/box',__('admin.Box'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>


