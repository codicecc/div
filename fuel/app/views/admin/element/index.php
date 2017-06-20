<h2><?php echo __('admin.ListingElements');?></h2>
<br>
<?php if ($elements): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo __('admin.Name');?></th>
			<th><?php echo __('admin.Note');?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($elements as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
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
<p><?php echo __('admin.NoElements');?>.</p>

<?php endif; ?>
<p>
<?php if(Auth::has_access(Request::active()->controller.'.create')):?>
	<?php echo Html::anchor('admin/element/create', __('admin.AddNew'), array('class' => 'btn btn-success')); ?>
<?php endif;?>
</p>
