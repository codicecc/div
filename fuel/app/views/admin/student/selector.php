<?php
$options = array();
foreach ($students as $student) {
	$options[$student->id] = $student->name;
}
echo Form::select('student_id', $measure->student->id, $options,array("class"=>"form-control"));
