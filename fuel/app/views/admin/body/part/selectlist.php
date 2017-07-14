	<p>
	<?php	
	echo Form::select('body_parts[]', 
			null,
			$body_parts,
			array(
				'size'=>'10',
				'multiple','class' => 'form-control',
				'data-id'=>'body_parts_List',
				'data-name'=>'body_parts_List',
				)
		);
	?>
	<small>Per selezionare / deselezionare tenere premuto il tasto CTRL e cliccare con il tasto sinisto del mouse.</small>
	</p>
