<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/measure/',__('admin.MeasureList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>
