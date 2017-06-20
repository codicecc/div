<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/detail/',__('admin.DetailList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>

