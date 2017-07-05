$(document).ready(function() {
	$('[data-id="studentListSave"]').click(function() {
		
		var $studentList=$('[data-id="studentList"]');
		var $studentListSelected=$('[data-id="studentList"] :selected');
		
		var $astudentListSelected = []; 
		$studentListSelected.each(function(i, selected){ 
		  $astudentListSelected[i] = $(selected).val();
		});
		
		/*
		console.log($studentList.data('model_id'));
		console.log($studentList.data('order_id'));
		console.log($studentList.data($studentListSelected.length));
		*/
		if($studentListSelected.length>0){
			$.post(
				uriBase + 'admin/model/student/update_student_list', {
					'model_id': $studentList.data('model_id'),
					'order_id': $studentList.data('order_id'),
					'astudentListSelected': $astudentListSelected,
				}
			);
		}
	});
});
