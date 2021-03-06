<?php
	$input_id = 'element_list_item_'.$element->id;
?>
<tr class="element_row">
	<td class="element_cell" id="element_list_item_li<?php echo $element->id;?>" data-name="element_list_li">
		<?php
			$checked=false;
			foreach($element->models as $element_model ) {
				if($model->id==$element_model->id)$checked=true;
			}
		?>
		<?php
		if($readonly==0){
		?>
		<input
			type="checkbox"
			autocomplete="off"
			id="<?php echo $input_id; ?>"
			data-element_id="<?php echo $element->id; ?>"
			data-model_id=<?php echo($model->id);?>
			data-name="element_list_item"
			<?php echo $checked ? 'checked' : ''; ?>
			class="element"
			>
		<?php
		}
		?>
		<label for="<?php echo $input_id; ?>">
			<?php echo $element->name; ?>
			<a target="_blank" href="/admin/detail/index/<?php echo $element->id;?>">
				<i class="fa fa-external-link fa-fw"></i>
			</a>
		</label>
	</td>
	<td>
		<?php echo render('admin/detail/table', array('readonly' => $readonly, 'element' => $element,'model' => $model)); ?>
	</td>
</tr>
