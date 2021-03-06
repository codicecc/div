<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css(array(
		'bootstrap.css',
		'custom.css',
		'print.css',
		'font-awesome.min.css',
		'sb-admin-2.min.css',
		'modal.css',
		));
	?>
	<style>
		body { margin: 50px; }
	</style>
	<script type="text/javascript">
	<?php
		echo 'var uriBase = '.Format::forge(Uri::base())->to_json().';';
	?>
	</script>
	<?php echo Asset::js(array(
		'https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js',
		'elementList.js',
		'detailList.js',
		'attributeItem.js',
		'orderStudentList.js',
		'modal.js',
		'order-model-toggle.js',
		'custom.js',
		'print.js',
	)); ?>
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
	<?php
		Config::load('custom', true);
		Config::load('navigation', true);
	?>
	<!-- Anchors and floating navigation bar -->
	<script>
		var shiftWindow = function() { scrollBy(0, -70) };
		if (location.hash) shiftWindow();
		window.addEventListener("hashchange", shiftWindow);
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>

	<?php if ($current_user): ?>
	<div class="navbar navbar-defult navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/admin/"><i class="fa fa-dashboard fa-fw"></i> <?php echo Config::get('project_name');?></a>
			</div>
			<div class="navbar-collapse collapse">
			<?php			

			echo Helper::build_menu(Config::get('navigation.navigation_bar'));
?>
			<ul class="nav navbar-nav pull-right">
					<li>
					<a href="#"
						title="<?php echo __('admin.Print');?>"
						data-toggle="print"
						data-target="#print">
						<span class="glyphicon glyphicon-print"></span>
						<?php //echo __('admin.Print');?>
						</a>
					</li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php if(Auth::has_access("Controller_Admin_Users.viewprofile")):?>						
							<li><?php echo Html::anchor('admin/users/viewprofile', __('admin.UserProfile')) ?></li>
							<?php endif;?>
							<li><?php echo Html::anchor('admin/logout', __('admin.Logout')) ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo (($current_user)?__('admin.'.$title):Config::get('project_name')); ?></h1>		
				<hr>
<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="col-md-12">
<?php echo $content; ?>
			</div>
		</div>
		<hr/>
		<footer class="noprint">
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
			<a href="https://www.francescodattolo.it/" target="_blank">
			<?php echo Asset::img('francescodattolo_favicon.png', array('id' => 'francescodattolofavicon','title'=>'Visibilità sul Web - Francescodattolo.it'));?></a>
			<a href="http://www.codice.cc/" target="_blank">
			<?php echo Asset::img('codice_favicon.png', array('id' => 'codicefavicon','title'=>'Web Developer Blog - Codice.Cc'));?></a>
			<a href="http://gnucms.org/" target="_blank">
			<?php echo Asset::img('gnucms_favicon.ico', array('id' => 'gnucmsfavicon','title'=>'Etica Hacker - GnuCMS.org'));?></a>			
			</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
		<today data-visibility="print"><?php echo date('D j M G:i:s Y');?></today>
	</div>
	<div class="modal"><!-- LOADING MODAL --></div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
</body>
</html>
