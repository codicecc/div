<?php
$options = array();
foreach ($elements as $element) {
	$options[$element->id] = $element->name;
}
echo Form::select('element_id', isset($student)?$student->element->id:0, $options,array("class"=>"form-control"));
