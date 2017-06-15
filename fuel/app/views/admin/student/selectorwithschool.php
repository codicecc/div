<?php
$options = array();
foreach ($students as $student) {
	$options[$student->id] = $student->name . " - " . $student->school->name;
}
$student_id=Input::post('student_id')?Input::post('student_id'):Uri::segment(4);
echo Form::select('student_id', isset($measure)?$measure->student->id:$student_id, $options,array("class"=>"form-control"));
