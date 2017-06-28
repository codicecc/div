<h2><?php echo __('admin.ListingModels');?></h2>
<br>
<?php if ($models): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo __('admin.SKU');?></th>
			<th><?php echo __('admin.Name');?></th>
			<th><?php echo __('admin.DifficultIndex');?></th>
			<th><?php echo __('admin.Note');?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($models as $item): ?>		<tr>

			<td><?php echo $item->sku; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->difficult_index; ?></td>
			<td><?php echo $item->note; ?></td>
			<td>
				<?php
					echo Utilities::adminActions($item,Request::active()->route->segments[1],array(array(__('admin.View'),'view'),array(__('admin.Edit'),'edit'),array(__('admin.Delete'),'delete'),));
				?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p><?php echo __('admin.NoModels');?>.</p>

<?php endif; ?>
<?php if(Auth::has_access(Request::active()->controller.'.create')):?>
	<?php echo Html::anchor('admin/model/create', __('admin.AddNew'), array('class' => 'btn btn-success')); ?>
<?php endif;?>
