<?php
$options = array();
foreach ($models as $model) {
	$options[$model->id] = $model->name;
}
echo Form::select('model_id', isset($order)?$order->model->id:0, $options,array("class"=>"form-control"));
