<?php
$options = array();
foreach ($students as $student) {
	$options[$student->id] = $student->name;
}
echo Form::select('student_id', isset($measure)?$measure->student->id:0, $options,array("class"=>"form-control"));
