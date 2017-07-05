<h2><?php echo __('admin.ListingSchools');?></h2>
<br>
<?php if ($schools): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo __('admin.Name');?></th>
			<th><?php echo __('admin.Note');?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($schools as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
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
<p>No Schools.</p>

<?php endif; ?>
<p>
<?php if(Auth::has_access(Request::active()->controller.'.create')):?>
	<?php echo Html::anchor('admin/school/create', __('admin.AddNew'), array('class' => 'btn btn-success')); ?>
<?php endif;?>
</p>
