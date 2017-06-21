<?php
	$input_id = 'element_list_'.$element->id;
?>
	<li>
		<input
			type="checkbox"
			autocomplete="off"
			id="<?php echo $input_id; ?>"
			data-element_id="<?php echo $element->id; ?>"
			<?php //echo $element->status ? 'checked' : ''; ?>
			>
		<label for="<?php echo $input_id; ?>">
			<?php echo $element->name; ?> <a target="_blank" href="/admin/detail/index/<?php echo $element->id;?>"><i class="fa fa-external-link fa-fw"></i></a>
		</label>
	</li>
