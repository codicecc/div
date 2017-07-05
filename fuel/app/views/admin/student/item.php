<?php
	$student=Model_Student::find($student_id);
?>
	<li class="student_list_item" id="student_list_item_li<?php echo $student_id;?>" data-name="student_list_li">
		<label>
			<?php echo $student->name; ?>
			<a target="_blank" href="/admin/student/index/<?php echo $student_id;?>">
				<i class="fa fa-external-link fa-fw"></i>
			</a>
		</label>
	</li>

