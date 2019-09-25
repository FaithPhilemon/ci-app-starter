<div class="dashboard-wrapper">
	<div class="dashboard-ecommerce">
		<div class="container-fluid dashboard-content ">
			<!-- ============================================================== -->
			<!-- pageheader  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="page-header">
						<h2 class="pageheader-title">| Admin Dashboard </h2>
						<!-- <p class="pageheader-text"></p> -->
						<div class="page-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Portal</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end pageheader  -->
			<!-- ============================================================== -->
			<div class="ecommerce-widget">

				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="text-muted">Members</h5>
								<div class="metric-value d-inline-block">
									<h1 class="mb-1"><?=$num_users ?></h1>
								</div>
								<!-- <div class="metric-label d-inline-block float-right text-success font-weight-bold">
									<span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
								</div> -->
							</div>
							<div id="sparkline-revenue"></div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="text-muted">Revenue</h5>
								<div class="metric-value d-inline-block">
									<h1 class="mb-1">&#8358; <?=$total_revenue ?></h1>
								</div>
								<!-- <div class="metric-label d-inline-block float-right text-success font-weight-bold">
									<span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
								</div> -->
							</div>
							<div id="sparkline-revenue2"></div>
						</div>
					</div>
					<!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="text-muted">Payment requests</h5>
								<div class="metric-value d-inline-block">
									<h1 class="mb-1">0.00</h1>
								</div>
								<div class="metric-label d-inline-block float-right text-primary font-weight-bold">
									<span>N/A</span>
								</div>
							</div>
							<div id="sparkline-revenue3"></div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="text-muted">Notifications</h5>
								<div class="metric-value d-inline-block">
									<h1 class="mb-1">$28000</h1>
								</div>
								<div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
									<span>-2.00%</span>
								</div>
							</div>
							<div id="sparkline-revenue4"></div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>

