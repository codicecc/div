<?php
$options = array();
foreach ($body_parts as $body_part) {
	$options[$body_part->id] = $body_part->name;
}
echo Form::select('body_part_id', isset($size)?$size->body_part->id:0, $options,array("class"=>"form-control"));
