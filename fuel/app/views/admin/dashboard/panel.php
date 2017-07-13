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
						<span class="pull-right text-muted small"><?php echo 
							'<i class="fa  '.Config::get('custom.icons.open.icon').'
								'.Config::get('custom.icons.open.text-color').'"></i>'; ?>
							<em><?php echo Helper::count("orders",array('closed'=>'0'))?></em>
						</span>
					</a>
					<a href="/admin/order/?closed=1" class="list-group-item">
						<i class="fa fa-shopping-cart fa-fw"></i> Ordini Chiusi
						<span class="pull-right text-muted small"><?php echo 
							'<i class="fa  '.Config::get('custom.icons.close.icon').'
								'.Config::get('custom.icons.close.text-color').'"></i>'; ?>
								<em><?php echo Helper::count("orders",array('closed'=>'1'))?></em>
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

				<a href="/admin/help" class="btn btn-primary btn-block">Guida Online</a>

			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
