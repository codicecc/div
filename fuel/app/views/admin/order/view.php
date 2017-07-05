<h2>Viewing #<?php echo $order->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $order->name; ?></p>
<p>
	<strong>Note:</strong>
	<?php echo $order->note; ?></p>

<?php echo Html::anchor('admin/order/edit/'.$order->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/order', 'Back'); ?>