<?php
$input_id = 'detail_list_item_'.$detail->id;
?>
<tr>
	<td class="detail_list_item">
		<?php
			$checked=false;
			foreach($model->details as $d){
				if($d->id==$detail->id)$checked=true;
			}
		?>
		<label for="<?php echo $input_id; ?>">
			<?php echo $detail->name; ?>
			<a target="_blank" href="/admin/detail/view/<?php echo $detail->id;?>">
				<i class="fa fa-external-link fa-fw"></i>
			</a>
		</label>
	</td>
	<td>
		<?php echo $detail->quantity_index; ?>
	</td>
	<td>
		<?php echo render('admin/attribute/cell', array('readonly' => $readonly,'detail' => $detail, 'model' => $model)); ?>
	</td>
</tr>
