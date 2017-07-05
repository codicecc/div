<h2><?php echo __('admin.Viewing');?> #<?php echo $order->id; ?></h2>

<p>
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $order->name; ?></p>
<p>
	<strong><?php echo __('admin.Model');?>:</strong>
	<?php echo $order->model->sku; ?></p>
<p>
	<strong><?php echo __('admin.School');?>:</strong>
	<?php echo $order->school->name; ?></p>
<?php
if(isset($student_selector)){
?>
<p>	
	<strong><?php echo __('admin.StudentSelecting');?>:</strong>
	<?php echo render('admin/student/list', array(
							'selected'=>$selected,
							'students'=>$students,
							'student_selector' => $student_selector,
							'order' => $order)
							); ?>
</p>
<?php
}
?>
<p>
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo $order->note; ?></p>

<?php echo render('admin/order/_actions'); ?>	
