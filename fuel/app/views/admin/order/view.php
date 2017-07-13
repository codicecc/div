<h2><?php echo __('admin.Viewing');?> #<?php echo $order->id; ?></h2>

<div class="form-group">
	<strong><?php echo __('admin.Name');?>:</strong>
	<?php echo $order->name; ?></div>

<div class=" form-group">
	<strong><?php echo __('admin.Model');?>:</strong>
	<?php echo $order->model->sku; ?>
	<a target="_blank" href="/admin/model/view/<?php echo $order->model->id;?>">
		<i class="fa fa-external-link fa-fw"></i>
	</a>

</div>

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
	<?php echo $order->closed?
	'<i class="fa  '.Config::get('custom.icons.close.icon').'
					'.Config::get('custom.icons.close.size').'
					'.Config::get('custom.icons.close.text-color').'"></i>':
	'<i class="fa  '.Config::get('custom.icons.open.icon').'
					'.Config::get('custom.icons.open.size').'
					'.Config::get('custom.icons.open.text-color').'"></i>'; ?>
</div>
	
<?php echo render('admin/order/_actions'); ?>	
