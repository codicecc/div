<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/element/',__('admin.ElementList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>
