<?php
$options = array();
foreach ($schools as $school) {
	$options[$school->id] = $school->name;
}
echo Form::select('school_id', isset($school)?$school->id:0, $options,array("class"=>"form-control"));
