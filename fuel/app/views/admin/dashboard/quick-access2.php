<div class="row">
	<?php if(Auth::has_access('Controller_Admin_Order.index')):?>	
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
	<?php endif;?>
	<?php if(Auth::has_access('Controller_Admin_Model.index')):?>	
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
	<?php endif;?>
	<?php if(Auth::has_access('Controller_Admin_Detail.index')):?>	
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
	<?php endif;?>
</div>
