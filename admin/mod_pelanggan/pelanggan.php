<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Pelanggan</h4>
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
				<a href="?pg=pelanggan">Data Pelanggan</a>
			</li>
		</ul>
		
	</div>

	<!-- Notif -->
	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "sukses"){
				echo '<div class="alert alert-success">
						Data Berhasil Di Update
					</div>';
			}
		}
	?>

	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				<?php 
					if($user['level'] == "Admin"){
					?>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
					<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
					
					<?php }
					else if($user['level'] == "Office") {
					?>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
					<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
					
					<?php	} ?>
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
											<div class="custom-file">
												<input type="file" name="file" class="custom-file-input" id="file" accept="application/vnd.ms-excel" aria-describedby="helpfile" required>
												<label class="custom-file-label">Import File Excel</label>
											</div>
				                            <small id="helpfile" class="form-text text-muted">File harus .xlx</small>
				                        </div>
										<div class="form-group">
											<a class="text-light btn btn-success btn-sm" href="../assets/uploaded/template_excel/template_pel.xls" >Download Template Excel</a>
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

				    <!-- Modal Tambah -->
				    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				        <div class="modal-dialog" role="document">
				            <div class="modal-content">
				                <form id="form-tambah">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Tambah Data Pelanggan</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label>Nama Pelanggan</label>
				                            <input type="text" name="nama_pel" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>Alamat</label>
				                            <input type="text" name="alamat" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>Phone</label>
				                            <input type="text" name="phone" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Layanan</label>
				                            <input type="text" name="layanan" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Customer Account</label>
				                            <input type="text" name="ca" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Customer Account Site</label>
				                            <input type="text" name="ca_site" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Customer Account Nipnas</label>
				                            <input type="text" name="ca_nipnas" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Billing Account</label>
				                            <input type="text" name="ba" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Billing Account Site</label>
				                            <input type="text" name="ba_site" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Nomor Quote</label>
				                            <input type="text" name="nomor_quote" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Nomor Aggrement</label>
				                            <input type="text" name="nomor_aggre" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Nomor Order</label>
				                            <input type="text" name="nomor_order" class="form-control">
				                        </div>
										<div class="form-group">
				                            <label>Sid</label>
				                            <input type="text" name="sid" class="form-control">
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
						<table id="basic-datatables" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th><input type='checkbox' id='ceksemua'></th>
									<th>#</th>
									<th>Nama Pelanggan</th>
									<th>Alamat</th>
									<th>Phone</th>
									<th>Layanan</th>
									<th>Customer Account</th>
									<th>Customer Account Site</th>
									<th>Customer Account Nipnas</th>
									<th>Billing Account</th>
									<th>Billing Account Site</th>
									<th>Nomor Quote</th>
									<th>Nomor Aggrement</th>
									<th>Nomor Order</th>
									<th>Sid</th>
									<th>Aksi</th>
								</tr>
							</thead>
						</table>
						<tbody>
							<!-- Edit Script Start -->
							<script>
								$('#form-edit<?= $no ?>').submit(function(e) {
									e.preventDefault();
									$.ajax({
										type: 'POST',
										url: 'mod_am/crud_am.php?pg=edit',
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
											if (json == 'ok') {
												iziToast.success({
													title: 'Terima Kasih!',
													message: 'Data berhasil disimpan',
													position: 'topCenter'
												});

											} else {
												iziToast.info({
													title: 'Sukses',
													message: 'Data berhasil disimpan',
													position: 'topCenter'
												});
											}
											setTimeout(function() {
												window.location.reload();
											}, 2000);
											//$('#bodyreset').load(location.href + ' #bodyreset');
										}
									});
									return false;
								});

								
											// Hapus with swal
											$('#basic-datatables').on('click', '.edit', function() {
													var id = $(this).data('id');
													$.ajax({
														url: 'mod_pelanggan/crud_pelanggan.php?pg=edit',
														type: "POST",
														data: 'id_pel=' + id,
														processData: false,
														contentType: false,
														cache: false,
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
												});
										</script>
										<!-- Script End -->
						</tbody>
					</div>
					<!-- End -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Script -->
<script>

	// Custom File Value
	$(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	$('#ceksemua').change(function() {
        $(this).parents('#basic-datatables:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });

	$(function() {
        $("#btnhapus").click(function() {
            id_array = new Array();
            i = 0;
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
			swal({
				title: 'Are you sure?',
				text: 'Akan menghapus data ini!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
			}).then((result) => {
				if (result) {
					$.ajax({
						url: "mod_pelanggan/crud_pelanggan.php?pg=hapusdaftar",
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
            return false;
        })
    });

	// Tampil Data 
	$(document).ready(function(){
		$('#basic-datatables').DataTable({
			processing: true,
			serverSide: true,
			// "ajax": "mod_pelanggan/fetchData.php",
			ajax: {
				"url": "mod_pelanggan/fetchData_tb.php?action=table_data",
				"dataType": "json",
				"type": "POST"
			},
			columns:[
				{"data": "check_id"},
				{"data": "no"},
				{"data": "nama_pel"},
				{"data": "alamat"},
				{"data": "phone"},
				{"data": "layanan"},
				{"data": "ca"},
				{"data": "ca_site"},
				{"data": "ca_nipnas"},
				{"data": "ba"},
				{"data": "ba_site"},
				{"data": "nomor_quote"},
				{"data": "nomor_aggre"},
				{"data": "nomor_order"},
				{"data": "sid"},
				{"data": "aksi"},
			],
			"columnDefs": [ {
				"targets": 0,
				"orderable": false
				} ]
		});

		// table.on('draw.dt', function () {
		// 		var info = table.page.info();
		// 		table.column(, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
		// 			cell.innerHTML = i + 1 + info.start;
		// 		});
		// 	});
	});

	// Hapus with swal
	$('#basic-datatables').on('click', '.hapus', function() {
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
                    url: 'mod_pelanggan/crud_pelanggan.php?pg=hapus',
                    method: "POST",
                    data: 'id_pel=' + id,
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

	$('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_pelanggan/crud_pelanggan.php?pg=tambah',
            data: $(this).serialize(),
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

    //IMPORT FILE PENDUKUNG 
    $('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_pelanggan/crud_pelanggan.php?pg=import',
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

                $('#importdata').modal('hide');
                iziToast.success({
                    title: 'Mantap!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<!-- End -->

<!-- Auto Close Alert -->
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);
    });    
</script>