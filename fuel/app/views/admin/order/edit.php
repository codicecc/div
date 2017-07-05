<h2>Editing Order</h2>
<br>

<?php echo render('admin/order/_form'); ?>
<p>
	<?php echo Html::anchor('admin/order/view/'.$order->id, 'View'); ?> |
	<?php echo Html::anchor('admin/order', 'Back'); ?></p>
