<?php
$options = array();
foreach ($elements as $element) {
	$options[$element->id] = $element->name;
}
$element_id=Input::post('element_id')?Input::post('element_id'):Uri::segment(4);
echo Form::select('element_id', isset($details)?$details->element->id:$element_id, $options,array("class"=>"form-control"));
