<ul id="student_list" data-name="student_list" data-order_id="<?php echo $order->id; ?>">
<?php 
foreach ($selected as $student) {
	echo render('admin/student/item', array('student_id' => $student["student_id"]));
}
?>
</ul>
