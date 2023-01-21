<div class="sidebar-wrapper scrollbar scrollbar-inner">
	<div class="sidebar-content">
		<div class="user">
			<div class="avatar-sm float-left mr-2">
				<?php if ($siswa['jenkel'] == "L") { ?>
				<img src="../assets/img/men_avatar.png" alt="..." class="avatar-img rounded-circle">
				<?php } else { ?>
				<img src="../assets/img/women_avatar.png" alt="..." class="avatar-img rounded-circle">
				<?php } ?>
			</div>
			<div class="info">
				<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
					<span>
						<?= $siswa['nama']?>
						<span class="user-level"><?= $siswa['no_daftar']?></span>
						<span class="caret"></span>
					</span>
				</a>
				<div class="clearfix"></div>

				<div class="collapse in" id="collapseExample">
					<ul class="nav">
						<!-- <li>
							<a href="#profile">
								<span class="link-collapse">My Profile</span>
							</a>
						</li>
						<li>
							<a href="#settings">
								<span class="link-collapse">Settings</span>
							</a>
						</li> -->
						<li>
							<a href="logout.php">
								<span class="link-collapse">Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<ul class="nav nav-primary">
			<li class="nav-item">
				<a href=".">
					<i class="fas fa-home"></i>
					<p>Dashboard</p>
				</a>
			</li>
			<li class="nav-section">
				<span class="sidebar-mini-icon">
					<i class="fa fa-ellipsis-h"></i>
				</span>
				<h4 class="text-section">Menu Utama</h4>
			</li>
			<li class="nav-item">
				<a data-toggle="collapse" href="#base">
					<i class="fas fa-layer-group"></i>
					<p>Data Master</p>
					<span class="caret"></span>
				</a>
				<div class="collapse" id="base">
					<ul class="nav nav-collapse">
						<li>
							<a href="?pg=siswa">
								<span class="sub-item">Data Siswa</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a data-toggle="collapse" href="#sidebarLayouts">
					<i class="fas fa-th-list"></i>
					<p>Data Ujian</p>
					<span class="caret"></span>
				</a>
				<div class="collapse" id="sidebarLayouts">
					<ul class="nav nav-collapse">
						<li>
							<a href="?pg=ujian">
								<span class="sub-item">Daftar Ujian</span>
							</a>
						</li>
						<li>
							<a href="?pg=kartu">
								<span class="sub-item">Kartu Peserta</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!-- <li class="nav-item">
				<a data-toggle="collapse" href="#forms">
					<i class="fas fa-pen-square"></i>
					<p>Setting</p>
					<span class="caret"></span>
				</a>
				<div class="collapse" id="forms">
					<ul class="nav nav-collapse">
						<li>
							<a href="?pg=user">
								<span class="sub-item">Users</span>
							</a>
						</li>
						<li>
							<a href="?pg=setting">
								<span class="sub-item">Pengaturan Aplikasi</span>
							</a>
						</li>
					</ul>
				</div>
			</li> -->
		</ul>
	</div>
</div>