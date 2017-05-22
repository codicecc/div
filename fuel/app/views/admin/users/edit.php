<h2><?php echo(__('admin.UserEdit'));?></h2>
<br>

<?php echo render('admin/users/_form'); ?>
<p>
<?php if(Auth::has_access(Request::active()->controller.'.view')):?>
		<?php echo Html::anchor('admin/users/view/'.$user->id, __('admin.View'), array('class' => 'btn btn-primary')); ?> 
<?php endif;?>
	<?php echo Html::anchor('admin/users', __('admin.Back'), array('class' => 'btn btn-primary')); ?></p>
