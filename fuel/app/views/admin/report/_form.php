<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label(__('admin.Order'), 'order_id', array('class'=>'control-label')); ?>

			<div>
			<?php
			$select_box = \Presenter::forge('admin/order/selector');
			echo $select_box;
			?>
			</div>
		</div>	
		<div>
			<div class="form-group">
				<label class='control-label'>&nbsp;</label>
				<?php echo Form::submit('submit', __('admin.Get'), array('class' => 'btn btn-primary')); ?>
			</div>
					
		</div>	
	</fieldset>
<?php echo Form::close(); ?>
