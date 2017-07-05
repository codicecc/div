<h2><?php echo __('admin.ListingSizes');?></h2>

<p>
<?php if(Auth::has_access(Request::active()->controller.'.create')):?>
	<?php echo Html::anchor('admin/size/create', __('admin.AddNew'), array('class' => 'btn btn-success')); ?>
<?php endif;?>
</p>

<?php if ($sizes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo __('admin.Min');?></th>
			<th><?php echo __('admin.Max');?></th>
			<th><?php echo __('admin.Reference');?></th>
			<th><?php echo __('admin.BodyPart');?></th>			
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sizes as $item): ?>		<tr>

			<td><?php echo $item->min; ?></td>
			<td><?php echo $item->max; ?></td>
			<td><?php echo $item->reference; ?></td>
			<td><?php echo $item->body_part->name; ?></td>			
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
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p><?php echo __('admin.NoSizes');?>.</p>
<?php endif; ?>
