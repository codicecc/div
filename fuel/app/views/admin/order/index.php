<h2><?php echo __('admin.ListingOrders');?></h2>
<br>
<?php if ($orders): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo __('admin.Name');?></th>
			<th><?php echo __('admin.Model');?></th>
			<th><?php echo __('admin.School');?></th>
			<th><?php echo __('admin.Note');?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($orders as $item): ?>		<tr>
			
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->model->name; ?></td>
			<td><?php echo $item->school->name; ?></td>
			<td><?php echo $item->note; ?></td>
			<td>
				<?php
					echo Utilities::adminActions(
						$item,
						Request::active()->route->segments[1],
						array(
							array(__('admin.View'),'view',
								array(
									"parameter" => "1",
									)							
								),
							array(__('admin.Edit'),'edit'),
							array(__('admin.Delete'),'delete',
								array(
									"class" => "danger",
								),
							),
						)
					);
				?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p><?php echo __('admin.NoOrders');?>.</p>

<?php endif; ?>
<p>
<?php if(Auth::has_access(Request::active()->controller.'.create')):?>
	<?php echo Html::anchor('admin/order/create', __('admin.AddNew'), array('class' => 'btn btn-success')); ?>
<?php endif;?>
</p>
