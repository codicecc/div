<?php if(Auth::has_access(Request::active()->controller.'.index')):?>
	<?php echo Html::anchor('admin/order/',__('admin.OrderList'),array("class"=>"btn btn-info")) ?> 
<?php endif;?>

