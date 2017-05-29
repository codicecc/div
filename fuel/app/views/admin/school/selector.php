<?php
$options = array();
foreach ($schools as $school) {
	$options[$school->id] = $school->name;
}
echo Form::select('school_id', isset($student)?$student->school->id:0, $options,array("class"=>"form-control"));
