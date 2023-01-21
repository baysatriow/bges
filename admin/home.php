<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Dashboard</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href=".">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					Selamat datang <?= $user['nama'] ?> di Sistem Customer Relationship Management (CRM) BGES Witel Lampung , gunakan menu disamping untuk memulai pekerjaan anda.
				</div>
			</div>
			<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-user-4 text-primary"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Total Pelanggan</p>
												<h4 class="card-title"><?=$total_pelanggan?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-file-1 text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="">
												<p class="card-category">Total Order</p>
												<h4 class="card-title"><?=$total_order?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-list text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Complete Order</p>
												<h4 class="card-title"><?=$total_complete?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
	</div>
</div>