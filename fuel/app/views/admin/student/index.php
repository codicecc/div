<h2><?php echo __('admin.ListingStudents');?></h2>
<br>
<?php if ($students): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo __('admin.Name');?></th>
			<th><?php echo __('admin.School');?></th>
			<th><?php echo __('admin.Note');?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($students as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->school->name; ?></td>
			<td><?php echo $item->note; ?></td>
			<td>
				<?php
					echo Html::anchor('/admin/measure/index/'.$item->id,"<i class=\"fa fa-user fa-1x\"></i> ".__('admin.Measures'), array('class' => 'btn btn-info'));
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
<p><?php echo __('admin.NoStudents');?>.</p>

<?php endif; ?>
<p>
<?php if(Auth::has_access(Request::active()->controller.'.create')):?>
	<?php echo Html::anchor('admin/student/create', __('admin.AddNew'), array('class' => 'btn btn-success')); ?>
<?php endif;?>
</p>
