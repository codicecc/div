<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/student/',__('admin.StudentList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>

