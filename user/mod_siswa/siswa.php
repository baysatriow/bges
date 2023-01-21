<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Siswa</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href=".">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="?pg=siswa">Data Siswa</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">
						Biodata <?= $siswa['nama'] ?>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<!-- Tabel Start -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['nama']?>" readonly>
							</div>
							<div class="form-group">
								<label>NIS</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['nis']?>" readonly>
							</div>
							<div class="form-group">
								<label>NISN</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['nisn']?>" readonly>
							</div>
							<div class="form-group">
								<label>NIK</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['nik']?>" readonly>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['jenkel']?>" readonly>
							</div>
							<div class="form-group">
								<label>Tempat Tanggal Lahir</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['tempat_lahir']?>, <?=$siswa['tgl_lahir']?>" readonly>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Kelas</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['kelas']?>" readonly>
							</div>
							<div class="form-group">
								<label>Jurusan</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['jurusan']?>" readonly>
							</div>
							<div class="form-group">
								<label>Agama</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['agama']?>" readonly>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['alamat']?>" readonly>
							</div>
							<div class="form-group">
								<label>RT/RW</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['rt']?> - <?=$siswa['rw']?>" readonly>
							</div>
							<div class="form-group">
								<label>Desa</label>
								<input type="text" class="form-control form-control" value="<?=$siswa['desa']?>" readonly>
							</div>
						</div>
						<!-- End -->
					</div>
				</div>
				<div class="card-footer">
					<a href="." class="btn btn-dark btn-xm">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>