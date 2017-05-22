<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/school/',__('admin.SchoolList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>

