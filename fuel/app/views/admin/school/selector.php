<?php
$options = array();
foreach ($schools as $school) {
	$options[$school->id] = $school->name;
}
echo Form::select('school_id', $student->school->id, $options,array("class"=>"form-control"));
