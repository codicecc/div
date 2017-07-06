<h2><?php echo __('admin.Viewing');?> #<?php echo $order->id; ?></h2>

<div class="form-group">
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $order->name; ?></div>

<div class=" form-group">
	<strong><?php echo __('admin.Model');?>:</strong>
	<?php echo $order->model->sku; ?></div>

<div class=" form-group">
	<strong><?php echo __('admin.School');?>:</strong>
	<?php echo $order->school->name; ?></div>
<div class="form-group">
	<label for="students"><?php echo __('admin.StudentSelecting');?>:</label>
<?php
if($student_selector>0){
	echo render('admin/student/selectlist', array(
					'selected'=>$selected,
					'students'=>$students,
					'student_selector' => $student_selector,
					'order' => $order)
					);
}
else{
	echo render('admin/student/list', array(
					'selected'=>$selected,
					'student_selector' => $student_selector,
					'order' => $order)
					);	
}
?>
</div>
<div class=" form-group">
	<strong><?php echo __('admin.Note');?>:</strong>
	<?php echo $order->note; ?></div>

<div class=" form-group">
	<strong><?php echo __('admin.Closed');?>:</strong>
	<?php echo $order->closed?__("admin.yes"):__("admin.no"); ?></div>
	
<?php echo render('admin/order/_actions'); ?>	
