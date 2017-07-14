<?php
$options = array();
foreach ($orders as $order) {
	$options[$order->id] = $order->name;
}
echo Form::select('order_id', intval(Input::post('order_id')), $options,array("class"=>"form-control"));
