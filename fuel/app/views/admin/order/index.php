<h2>Listing Orders</h2>
<br>
<?php if ($orders): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Note</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($orders as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->note; ?></td>
			<td>
				<?php echo Html::anchor('admin/order/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/order/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/order/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Orders.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/order/create', 'Add new Order', array('class' => 'btn btn-success')); ?>

</p>
