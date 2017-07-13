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
