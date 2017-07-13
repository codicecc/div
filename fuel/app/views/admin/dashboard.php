<?php
?>
<div class="row">
	<div class="col-lg-8">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-heading">
					<h2>Gestione Ordini</h2>
				</div>
			</div>				
			<div class="col-lg-4 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo Helper::count("orders")?></div>
								<div><?php echo __("admin.Orders");?>!</div>
							</div>
						</div>
					</div>
					<a href="/admin/order">
						<div class="panel-footer">
							<span class="pull-left"><?php echo __("admin.Details");?></span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="row">		
			<div class="col-md-12">
				<div class="panel-heading">
					<h2>Gestione Misure, Taglie, Studenti e Scuole</h2>
				</div>
			</div>				
			<div class="col-lg-4 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-university fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo Helper::count("schools")?></div>
								<div><?php echo __("admin.Schools");?>!</div>
							</div>
						</div>
					</div>
					<a href="/admin/school">
						<div class="panel-footer">
							<span class="pull-left"><?php echo __("admin.Details");?></span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="panel panel-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-user fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo Helper::count("students")?></div>
								<div><?php echo __("admin.Students");?>!</div>
							</div>
						</div>
					</div>
					<a href="/admin/student">
						<div class="panel-footer">
							<span class="pull-left"><?php echo __("admin.Details");?></span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-tasks fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo Helper::count("measures")?></div>
								<div><?php echo __("admin.Measures");?>!</div>
							</div>
						</div>
					</div>
					<a href="/admin/measure">
						<div class="panel-footer">
							<span class="pull-left"><?php echo __("admin.Details");?></span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel-heading">
					<h2>Gestione Elementi, Dettagli e Modelli</h2>
				</div>
			</div>				
			<div class="col-lg-4 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-tag fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo Helper::count("elements")?></div>
								<div><?php echo __("admin.Elements");?>!</div>
							</div>
						</div>
					</div>
					<a href="/admin/element">
						<div class="panel-footer">
							<span class="pull-left"><?php echo __("admin.Details");?></span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="panel panel-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-dot-circle-o fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo Helper::count("details")?></div>
								<div><?php echo __("admin.Details");?>!</div>
							</div>
						</div>
					</div>
					<a href="/admin/detail">
						<div class="panel-footer">
							<span class="pull-left"><?php echo __("admin.Details");?></span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-database fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo Helper::count("models")?></div>
								<div><?php echo __("admin.Models");?>!</div>
							</div>
						</div>
					</div>
					<a href="/admin/model">
						<div class="panel-footer">
							<span class="pull-left"><?php echo __("admin.Details");?></span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bell fa-fw"></i> Notifiche
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="list-group">
					<a href="/admin/order/" class="list-group-item">
						<i class="fa fa-shopping-cart fa-fw"></i> Ordini Totali
						<span class="pull-right text-muted small"><em><?php echo Helper::count("orders")?></em>
						</span>
					</a>
					<a href="/admin/order/?closed=0" class="list-group-item">
						<i class="fa fa-shopping-cart fa-fw"></i> Ordini Aperti
						<span class="pull-right text-muted small"><em><?php echo Helper::count("orders",array('closed'=>'0'))?></em>
						</span>
					</a>
					<a href="/admin/order/?closed=1" class="list-group-item">
						<i class="fa fa-shopping-cart fa-fw"></i> Ordini Chiusi
						<span class="pull-right text-muted small"><em><?php echo Helper::count("orders",array('closed'=>'1'))?></em>
						</span>
					</a>
<!--
					<a href="#" class="list-group-item">
						<i class="fa fa-twitter fa-fw"></i> 3 New Followers
						<span class="pull-right text-muted small"><em>12 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-envelope fa-fw"></i> Message Sent
						<span class="pull-right text-muted small"><em>27 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-tasks fa-fw"></i> New Task
						<span class="pull-right text-muted small"><em>43 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-upload fa-fw"></i> Server Rebooted
						<span class="pull-right text-muted small"><em>11:32 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-bolt fa-fw"></i> Server Crashed!
						<span class="pull-right text-muted small"><em>11:13 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-warning fa-fw"></i> Server Not Responding
						<span class="pull-right text-muted small"><em>10:57 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
						<span class="pull-right text-muted small"><em>9:49 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-money fa-fw"></i> Payment Received
						<span class="pull-right text-muted small"><em>Yesterday</em>
						</span>
					</a>
-->					
				</div>
				<!-- /.list-group -->
<!--
				<a href="#" class="btn btn-default btn-block">View All Alerts</a>
-->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
</div>
