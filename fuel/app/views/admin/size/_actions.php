<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/size/',__('admin.SizeList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>

