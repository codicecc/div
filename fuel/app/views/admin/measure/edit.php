<h2>Editing Measure</h2>
<br>

<?php echo render('admin/measure/_form'); ?>
<p>
	<?php echo Html::anchor('admin/measure/view/'.$measure->id, 'View'); ?> |
	<?php echo Html::anchor('admin/measure', 'Back'); ?></p>
