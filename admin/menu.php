<div class="sidebar-wrapper scrollbar scrollbar-inner">
	<div class="sidebar-content">
		<div class="user">
			<div class="avatar-sm float-left mr-2">
			<img src="../assets/uploaded/profile/<?= $user['photo'] ?>" alt="..." class="avatar-img rounded-circle">
			</div>
			<div class="info">
				<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
					<span>
						<?= $user['nama']?>
						<span class="user-level"><?= $user['Roles']?></span>
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
				<a href="?pg=pelanggan">
					<i class="fas fa-user-shield"></i>
					<p>Data Pelanggan</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?pg=order">
					<i class="fas fa-file-contract"></i>
					<p>Data Order</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?pg=kontrak">
					<i class="fas fa-print"></i>
					<p>Data Kontrak</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?pg=am">
					<i class="far fa-id-badge"></i>
					<p>Data Account Manager</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?pg=user">
					<i class="fas fa-user"></i>
					<p>Data User</p>
				</a>
			</li>
			<li class="nav-item">
				<a data-toggle="collapse" href="#forms">
					<i class="fas fa-pen-square"></i>
					<p>Setting</p>
					<span class="caret"></span>
				</a>
				<div class="collapse" id="forms">
					<ul class="nav nav-collapse">
						<li>
							<a href="?pg=usetting">
								<span class="sub-item">Users</span>
							</a>
						</li>
						<?php
						if($user['level'] == "admin"){
							?>
						<li>
							<a href="?pg=setting">
								<span class="sub-item">Pengaturan Aplikasi</span>
							</a>
						</li>
						<?php }?>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>