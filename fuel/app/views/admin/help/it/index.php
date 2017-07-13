<h2 id="up"><?php echo __('admin.Help');?> online</h2>
<div class="row-fluid">
	<div class="col-md-3">
		<?php echo render('admin/help/it/sidebar-navigation');?>
	</div>
	<div class="col-md-9">
		<?php echo render('admin/help/it/welcome'); ?>
		<div class="row-fluid" id="introduction">
			<?php echo render('admin/help/it/introduction'); ?>
		</div>

		<div class="row-fluid" id="preface">
			<?php echo render('admin/help/it/preface'); ?>
		</div>

		<div class="row-fluid" id="logical-flow">
			<?php echo render('admin/help/it/logical-flow'); ?>
		</div>

		<div class="row-fluid" id="sections">
			<?php echo render('admin/help/it/sections.php'); ?>
		</div>

		<div class="row-fluid" id="sections">
			<?php echo render('admin/help/it/faq.php'); ?>
		</div>
	</div>
</div>
