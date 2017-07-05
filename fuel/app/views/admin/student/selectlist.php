	<p>
	<?php	
	echo Form::select('students', 
			$selected,
			$students,
			array(
				'size'=>'10',
				'multiple','class' => 'form-control',
				'data-id'=>'studentList',
				'data-name'=>'studentList',
				'data-model_id'=>$order->model->id,
				'data-order_id'=>$order->id,
				)
		);
	?>
	<small>Per selezionare più studenti tenere premuto il tasto CTRL e cliccare con il tasto sinisto del mouse.</small>
	<small>Per salvare la selezione cliccare su Salva.</small>
	</p>
	<p>
	<?php
		echo Form::submit('button', __('admin.Save'), array(
														'data-name'=>'studentSave',
														'data-id'=>'studentListSave',
														'class' => 'btn btn-primary'
														)
													);
	?>
	</p>
