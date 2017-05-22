<h2>Editing School</h2>
<br>

<?php echo render('admin/school/_form'); ?>
<p>
	<?php echo Html::anchor('admin/school/view/'.$school->id, 'View'); ?> |
	<?php echo Html::anchor('admin/school', 'Back'); ?></p>
