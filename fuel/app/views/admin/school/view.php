<h2>Viewing #<?php echo $school->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $school->name; ?></p>
<p>
	<strong>Note:</strong>
	<?php echo $school->note; ?></p>

<?php echo Html::anchor('admin/school/edit/'.$school->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/school', 'Back'); ?>