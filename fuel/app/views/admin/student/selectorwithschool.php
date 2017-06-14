<?php
$options = array();
foreach ($students as $student) {
	$options[$student->id] = $student->name . " - " . $student->school->name;
}
echo Form::select('student_id', isset($measure)?$measure->student->id:Input::post('student_id'), $options,array("class"=>"form-control"));
