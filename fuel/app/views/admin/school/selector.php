<?php
$options = array();
foreach ($schools as $school) {
	$options[$school->id] = $school->name;
}

$selected=isset($student)?$student->school->id:0;
if($selected==0)$selected=isset($order)?$order->school->id:0;

echo Form::select('school_id', $selected, $options,array("class"=>"form-control"));
