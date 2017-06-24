<?php
	$input_id = 'detail_list_'.$detail->id;
?>
	<li class="detail_list_item">
		<?php
			$checked=false;
			 foreach($detail->models as $detail_model ) {
				if($detail->id==$detail_model->id)$checked=true;
			}
		?>
		<input
			type="checkbox"
			autocomplete="off"
			id="<?php echo $input_id; ?>"
			data-detail_id="<?php echo $detail->id; ?>"
			<?php echo $checked ? 'checked' : ''; ?>
			>
		<label for="<?php echo $input_id; ?>">
			<?php echo $detail->name; ?>
			<a target="_blank" href="/admin/detail/view/<?php echo $detail->id;?>">
				<i class="fa fa-external-link fa-fw"></i>
			</a>
		</label>
	</li>
