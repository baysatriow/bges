<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data User</h4>
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
				<a href="?pg=user">Data User</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				<?php 
					if($user['level'] == "admin"){
					?>
					<!-- <button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button> -->
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
					<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
					<?php } ?>
					<!-- Modal Area -->
					<!-- Modal Import -->
				    <div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				        <div class="modal-dialog" role="document">
				            <div class="modal-content">
				                <form id="form-import">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Import Data</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label for="file">Import File Excel</label>
				                            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
				                            <small id="helpfile" class="form-text text-muted">File harus .xlx</small>
				                        </div>
				                        <a href="template_excel/importsekolah.xls">Download template Excel</a>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				                        <button type="submit" class="btn btn-dark">Save</button>
				                    </div>
				                </form>
				            </div>
				        </div>
				    </div>

				    <!-- Modal Tambah -->
				    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				        <div class="modal-dialog" role="document">
				            <div class="modal-content">
				                <form id="form-tambah" enctype='multipart/form-data'>
				                    <div class="modal-header">
				                        <h5 class="modal-title">Tambah Data User</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label>Nama</label>
				                            <input type="text" name="nama" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>Email</label>
				                            <input type="email" name="email" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Username</label>
				                            <input type="text" name="username" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Password</label>
				                            <input type="password" name="password" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Phone</label>
				                            <input type="text" name="phone" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Roles</label>
				                            <!-- <input type="text" name="Roles" class="form-control" required=""> -->
											<select name="Roles" id="" class="form-control" required=''>
												<option value="Admin">Admin</option>
												<option value="AM">AM</option>
												<option value="Office">Office</option>
											</select>
				                        </div>
										<div class="form-group">
										<label >Photo</label>
				                            <!-- <input type="text" name="photo" class="form-control" required=""> -->
										<div class="custom-file">
											<input type="file" name="profile" class="custom-file-input" id="customFile">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
				                        </div>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				                        <button type="submit" class="btn btn-dark">Save</button>
				                    </div>
				                </form>
				            </div>
				        </div>
				    </div>
					<!-- End Modal Area -->
				</div>
				<div class="card-body">
					<!-- Tabel Start -->
					<div class="table-responsive">
						<table id="basic-datatables1" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th><input type='checkbox' id='ceksemua'></th>
									<th>#</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Username</th>
									<th>Phone</th>
									<th>Roles</th>
									<th>Photo</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
		                            $query = mysqli_query($koneksi, "select * from tb_user");
		                            $no = 0;
		                            while ($user = mysqli_fetch_array($query)) {
		                                $no++;
		                            ?>
								<tr>
									<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $user['id_user'] ?>"></td>
									<td><?= $no; ?></td>
									<td><?= $user['nama'] ?></td>
									<td><?= $user['email'] ?></td>
									<td><?= $user['username'] ?></td>
									<td><?= $user['phone'] ?></td>
									<td><?= $user['Roles'] ?></td>
									<!-- <td><img src="../assets/uploaded/profile/<?= $user['photo'] ?>" alt="<?= $user['nama'] ?>" class="img-thumbnail" width="100px"></td> -->
									<td>
										<div class="image-gallery">
											<a href="../assets/uploaded/profile/<?= $user['photo'] ?>" class="col-6 col-md-3 mb-4">
												<img src="../assets/uploaded/profile/<?= $user['photo'] ?>" class="img-thumbnail" width="100px">
											</a>
										</div>
									</td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($user['id_user']) ?>"><i class="fas fa-info-circle"></i></button>
										<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-edit<?= $no ?>"><i class="fas fa-plus-square"></i> Edit</button>
										<button type='button' class='hapus btn btn-danger btn-xs'  data-id="<?= $user['id_user'] ?>" >Hapus</button>
										
										<!-- Modal Details Start-->
										<div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($user['id_user']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-detail">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail User <b><?= $user['nama'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
									                            <label>Nama</label>
									                            <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>Email</label>
									                            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>"readonly>
									                        </div>
															<div class="form-group">
									                            <label>Username</label>
									                            <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>"readonly>
									                        </div>
															
									                        <div class="form-group">
									                            <label>Phone</label>
									                            <input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>Roles</label>
									                            <input type="text" name="Roles" class="form-control" value="<?= $user['Roles'] ?>"readonly>
									                        </div>
															<div class="form-group align-items-center">
																<label class="form-control-label">Photo</label>
																<div>
																<img src="../assets/uploaded/profile/<?= $user['photo'] ?>" alt="Profile" class="img-thumbnail" width="100px">
																</div>
															</div>
									                    </div>
									                    <div class="modal-footer">
									                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
										<!-- Modal Details End-->
										
										<!-- Modal Edit Start -->
										<div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form id="form-edit<?= $no ?>" enctype='multipart/form-data'>
														<div class="modal-header">
															<h5 class="modal-title">Edit Data User</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Nama</label>
																<input type="hidden" name="id_user" class="form-control" value="<?= $user['id_user'] ?>">
																<input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>">
															</div>
															<div class="form-group">
																<label>Email</label>
																<input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
															</div>
															<div class="form-group">
																<label>Username</label>
																<input type="text" name="username" class="form-control" value="<?= $user['username'] ?>">
															</div>
											
															<div class="form-group">
																<label>Phone</label>
																<input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?>">
															</div>
															<div class="form-group">
																<label>Roles</label>
																<!-- <input type="text" name="Roles" class="form-control" required=""> -->
																<select name="Roles" id="" class="form-control" >
																	<option value="Admin">Admin</option>
																	<option value="AM">AM</option>
																	<option value="Office">Office</option>
																</select>
															</div>
															<div class="form-group">
																<label>Password Baru</label>
																<input type="password" name="password_baru" class="form-control">
															</div>
															
															<div class="form-group align-items-center">
																<label class="form-control-label">Photo</label>
																
																<div>
																	<img src="../assets/uploaded/profile/<?= $user['photo'] ?>" alt="Profile" class="img-thumbnail" width="100px">
																</div>
																<div class="form-group">
																<div class="custom-file">
																	<input type="file" name="profile" class="custom-file-input" id="customFile">
																	<label class="custom-file-label" for="customFile">Choose file</label>
																</div>
																</div>
															</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-dark">Save</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal Edit Ends -->
										<!-- Edit Script Start -->
										<script>
											$('#form-edit<?= $no ?>').submit(function(e) {
												e.preventDefault();
												$.ajax({
													type: 'POST',
													url: 'mod_user/crud_user.php?pg=edit',
													data: new FormData(this),
													processData: false,
													contentType: false,
													cache: false,
													beforeSend: function() {
														$('#btnsimpan').prop('disabled', true);
													},
													success: function(data) {
														var json = data;
														$('#btnsimpan').prop('disabled', false);
														if (json == 'ukuran'){
															iziToast.warning({
																title: 'Maaf',
																message: 'Ukuran Data Terlalu Besar',
																position: 'topCenter'
															});
														} else {
															iziToast.success({
																title: 'Terima Kasih!',
																message: 'Data berhasil disimpan',
																position: 'topCenter'
															});
															setTimeout(function() {
															window.location.reload();
															}, 2000);

														}
														
														//$('#bodyreset').load(location.href + ' #bodyreset');
													}
												});
												return false;
											});
										</script>
										<!-- Script End -->
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- End -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Script -->
<script>
	// Custom File Value Style
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	// Checklist Value Check
	$('#ceksemua').change(function() {
        $(this).parents('#basic-datatables:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });

	// Delete Button From Checklist Value
    $(function() {
        $("#btnhapus").click(function() {
            id_array = new Array();
            i = 0;
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
            $.ajax({
                url: "mod_user/crud_user.php?pg=hapusdaftar",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
                        })
                    }
                }
            });
            return false;
        })
    });

	// Delete Record By id
	// function hapus(id) {
	// 	$.ajax({
	// 		type: 'POST',
	// 		data: 'id='+id,
	// 		url: 'mod_user/crud_user.php?pg=hapus',
	// 		success: function(data) {
    //             if (data == 'OK') {
    //                 iziToast.success({
    //                     title: 'Mantap!',
    //                     message: 'Data Berhasil di Hapus',
    //                     position: 'topRight'
    //                 });
    //                 setTimeout(function() {
    //                     window.location.reload();
    //                 }, 2000);
               
    //             } else {
    //                 iziToast.error({
    //                     title: 'Maaf!',
    //                     message: 'Data Gagal dihapus',
    //                     position: 'topRight'
    //                 });
    //             }
    //             //$('#bodyreset').load(location.href + ' #bodyreset');
    //         }
	// 		});
	// 	}

		$('#basic-datatables1').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_user/crud_user.php?pg=hapus',
                    method: "POST",
                    data: 'id_user=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Success',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });

	// Add Data
	$('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_user/crud_user.php?pg=tambah_aja',
			data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil ditambahkan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#tambahdata').modal('hide');
                } else if(data == 'ukuran') {
                    iziToast.warning({
                        title: 'Maaf!',
                        message: 'Ukuran File Lebih dari 2MB',
                        position: 'topRight'
                    });
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal ditambahkan',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

	// Edit Data
	$('#form-edit').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_user/crud_user.php?pg=ubah',
			data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil ditambahkan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#editdata').modal('hide');
                } else if(data == 'ukuran') {
                    iziToast.warning({
                        title: 'Maaf!',
                        message: 'Ukuran File Lebih dari 2MB',
                        position: 'topRight'
                    });
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal ditambahkan',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

</script>
<!-- End -->