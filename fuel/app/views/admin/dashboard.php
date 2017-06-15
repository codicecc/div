<div class="row">
	<div class="col-lg-3 col-md-6">
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
	<div class="col-lg-3 col-md-6">
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
	<div class="col-lg-3 col-md-6">
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
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-support fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">13</div>
						<div>Argomenti in Guida!</div>
					</div>
				</div>
			</div>
			<a href="/admin/help">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
