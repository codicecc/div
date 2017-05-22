<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/body/part/',__('admin.Body_partList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>

