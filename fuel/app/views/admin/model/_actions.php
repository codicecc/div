<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/model/',__('admin.ModelList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>

