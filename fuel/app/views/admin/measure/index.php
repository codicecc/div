<h2><?php echo __('admin.ListingMeasures');?></h2>
<br>
<div style="float:left;margin:0 4rem 0 0;">
<?php echo render('admin/measure/_processCSVFile'); ?>
</div>
<div>
<?php echo render('admin/measure/_studentFinder'); ?>
</div>
<?php if ($measures): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo __('admin.Student');?></th>
			<th><?php echo __('admin.School');?></th>
			<th><?php echo __('admin.Body_part');?></th>
			<th><?php echo __('admin.Value');?></th>
			<th><?php echo __('admin.Note');?></th>
			<th><?php echo __('admin.Measure');?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($measures as $item): ?>		<tr>

			<td><?php echo $item->student->name; ?></td>
			<td><?php echo $item->student->school->name; ?></td>
			<td><?php echo $item->body_part->name; ?></td>
			<td><?php echo $item->value; ?></td>
			<td><?php echo $item->note; ?></td>
			<td><?php echo Hsize::getSize($item->student->id,$item->body_part->id,$item->value);?></td>			
			<td>
				<?php
					echo Utilities::adminActions($item,Request::active()->route->segments[1],array(array(__('admin.View'),'view'),array(__('admin.Edit'),'edit'),array(__('admin.Delete'),'delete'),));
				?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p><?php echo __('admin.NoMeasures');?>.</p>


<?php endif; ?>
<p>
<?php if(Auth::has_access(Request::active()->controller.'.create')):?>
	<?php echo Html::anchor('admin/measure/create', __('admin.AddNew'), array('class' => 'btn btn-success')); ?>
<?php endif;?>
</p>
