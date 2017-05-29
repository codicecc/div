<?php
$options = array();
foreach ($body_parts as $body_part) {
	$options[$body_part->id] = $body_part->name;
}
echo Form::select('body_part_id', isset($measure)?$measure->body_part->id->id:0, $options,array("class"=>"form-control"));
