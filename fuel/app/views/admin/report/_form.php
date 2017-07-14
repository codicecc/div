<?php //echo Form::open(array("class"=>"form-horizontal")); 
echo Form::open(array('class'=>'form-horizontal','action' => '/admin/report/getcsv', 'method' => 'post'));
?>

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
<?php
if($report->filter->body_parts){
/*
$selected,
$body_parts,
*/
?>
<div class="form-group">
	<label for="body_parts"><?php echo __('admin.BodyPartSelecting');?>:</label>
<?php
	echo render('admin/body/part/selectlist', array(
					'body_parts'=>$body_parts,
					)
				);
?>
</div>
<?php
}		
?>
		<div>
			<div class="form-group">
				<label class='control-label'>&nbsp;</label>
				<?php echo Form::submit('submit', __('admin.Get'), array('class' => 'btn btn-primary')); ?>
			</div>
					
		</div>	
	</fieldset>
<?php echo Form::close(); ?>
