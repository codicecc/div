<h2>Viewing #<?php echo $measure->id; ?></h2>

<p>
	<strong>Student id:</strong>
	<?php echo $measure->student_id; ?></p>
<p>
	<strong>Body part id:</strong>
	<?php echo $measure->body_part_id; ?></p>
<p>
	<strong>Value:</strong>
	<?php echo $measure->value; ?></p>
<p>
	<strong>Note:</strong>
	<?php echo $measure->note; ?></p>

<?php echo Html::anchor('admin/measure/edit/'.$measure->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/measure', 'Back'); ?>