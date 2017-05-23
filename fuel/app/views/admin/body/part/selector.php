<?php
$options = array();
foreach ($body_parts as $body_part) {
	$options[$body_part->id] = $body_part->name;
}
echo Form::select('body_part_id', $measure->body_part->id, $options,array("class"=>"form-control"));
