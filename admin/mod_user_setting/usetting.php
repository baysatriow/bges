<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Pengaturan User</h4>
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
				<a href="#">Setting</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="?pg=setting">Pengaturan User</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form id="form-setting">
			<div class="card" id="settings-card">
				<div class="card-header">
					Halaman ini memuat pengaturan pengguna
				</div>
				<div class="card-body">
					<div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama</label>
		                <div class="col-sm-6 col-md-9">
							<input type="hidden" name="id_user"  class="form-control" value="<?= $user_setting['id_user'] ?>">
		                    <input type="text" name="nama" class="form-control" value="<?= $user_setting['nama'] ?>" required>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Username</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="text" name="username" class="form-control" value="<?= $user_setting['username'] ?>" required>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label for="site-description" class="form-control-label col-sm-3 text-md-right">Email</label>
		                <div class="col-sm-6 col-md-9">
						<input type="text" name="email" class="form-control" value="<?= $user_setting['email'] ?>" required>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Phone</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="text" name="phone" class="form-control" value="<?= $user_setting['phone'] ?>" required>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Roles</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="text" name="Roles" class="form-control" value="<?= $user_setting['Roles'] ?>" readonly>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label class="form-control-label col-sm-3 text-md-right">Photo Profile</label>
		                <div class="col-sm-6 col-md-9">

		                    <div class="custom-file">
		                        <input type="file" name="profile" class="custom-file-input" id="profile">
		                        <label class="custom-file-label">Choose File</label>
		                    </div>
		                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label class="form-control-label col-sm-3 text-md-right">Preview</label>
		                <div class="col-sm-6 col-md-6">
		                    <!-- <img src="../assets/uploaded/profile/<?= $user_setting['photo'] ?>" alt="Profile" class="img-thumbnail" width="100"> -->
							<div class="image-gallery">
											<a href="../assets/uploaded/profile/<?= $user_setting['photo'] ?>" class="col-6 col-md-3 mb-4">
											<img src="../assets/uploaded/profile/<?= $user_setting['photo'] ?>" alt="Profile" class="img-thumbnail" width="100">
											</a>
										</div>
		                </div>
		            </div>
					<!-- <div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password Lama</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="password" name="password_lama" class="form-control">
		                </div>
		            </div> -->
					<div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password Baru</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="password" name="password_baru" class="form-control">
		                </div>
		            </div>
				</div>
				<div class="card-footer text-md-right">
					<button type="submit" class="btn btn-dark" id="save-btn">Save Changes</button>
            		<button class="btn btn-danger" type="button">Reset</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- Page Script -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

	// Edit Data
    $('#form-setting').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_user_setting/crud_usetting.php?pg=ubah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {
                if(data == 'SUKSES'){
					iziToast.warning({
                        title: 'Maaf!',
                        message: 'Ukuran File Terlalu Besar',
                        position: 'topRight'
                    });
				}else if (data == 'PW') {
                    iziToast.info({
                        title: 'Maaf!',
                        message: 'Password Lama Salah!!',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }else{
                    iziToast.info({
                        title: 'Sukses',
                        message: 'Data Berhasil diubah',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
    });
</script>