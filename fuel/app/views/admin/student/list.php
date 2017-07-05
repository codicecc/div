<fieldset>
	<div class="form-group">
	<?php	
	echo Form::select('students', 
			$selected,
			$students,
			array('multiple','class' => 'col-md-4 form-control', 'placeholder'=>'Name')
		);
	?>
	</div>
</fieldset>
