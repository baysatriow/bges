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
			<!-- <style>
				.card:hover{
				transform: scale(1.05);
				box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
				}
			</style> -->
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<a class="card-link" href="?pg=pelanggan">
						<div class="card card-count card-stats card-round ">
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
					</a>
				</div>
				<div class="col-sm-6 col-md-3">
					<a class="card-link" href="?pg=order">
						<div class="card card-count card-stats card-round">
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
					</a>
				</div>
				<div class="col-sm-6 col-md-3">
					<a class="card-link" href="?pg=order">
						<div class="card card-count card-stats card-round">
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
					</a>
				</div>
				<div class="col-sm-6 col-md-3">
					<a class="card-link" href="?pg=kontrak">
						<div class="card card-count card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="flaticon-folder text-danger"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">Data Kontrak</p>
											<h4 class="card-title"><?=$total_kontrak?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>