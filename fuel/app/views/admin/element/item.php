<?php
	$input_id = 'element_list_'.$element->id;
?>
	<li class="element_list_item">
		<?php
			$checked=false;
			foreach($element->models as $element_model ) {
				if($model->id==$element_model->id)$checked=true;
			}
		?>
		<input
			type="checkbox"
			autocomplete="off"
			id="<?php echo $input_id; ?>"
			data-element_id="<?php echo $element->id; ?>"
			<?php echo $checked ? 'checked' : ''; ?>
			>
		<label for="<?php echo $input_id; ?>">
			<?php echo $element->name; ?>
			<a target="_blank" href="/admin/detail/index/<?php echo $element->id;?>">
				<i class="fa fa-external-link fa-fw"></i>
			</a>
		</label>
		<?php echo render('admin/detail/list', array('element' => $element,'model' => $model)); ?>
	</li>

