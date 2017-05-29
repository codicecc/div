<h2><?php echo __('admin.ListingBody_parts');?></h2>
<br>
<?php if ($body_parts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>id</th>			
			<th><?php echo __('admin.Name');?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($body_parts as $item): ?>		<tr>
			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->name; ?></td>
			<td>
				<?php
					echo Utilities::adminActions($item,Request::active()->route->segments[1]."/".Request::active()->route->segments[2],array(array(__('admin.Edit'),'edit'),array(__('admin.Delete'),'delete'),));
				?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p><?php echo __('admin.NoBody_parts');?>.</p>

<?php endif; ?>
<p>
<?php if(Auth::has_access(Request::active()->controller.'.create')):?>
	<?php echo Html::anchor('admin/body/part/create', __('admin.AddNew'), array('class' => 'btn btn-success')); ?>
<?php endif;?>
</p>
