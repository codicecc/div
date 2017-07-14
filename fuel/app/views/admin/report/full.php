<h2><?php echo __('admin.Report');?></h2>
<br>
<?php echo render('admin/report/_form',array('report' => $report,'body_parts' => $body_parts)); ?>
<?php echo render('admin/report/_actions'); ?>	
