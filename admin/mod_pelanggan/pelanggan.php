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
				echo "<script type='text/javascript'>iziToast.info({
							title: 'Success',
							message: 'Data Berhasil diubah',
							position: 'topRight'
							});
							setTimeout(function() {
							window.location.href = '?pg=pelanggan';
							}, 2000);
					 </script>";
			}
		}
	?>

	<!-- Removes Default Search Datatables -->
	<!-- <style>
		.dataTables_filter {
		visibility: hidden;
		}
	</style> -->

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				<?php 
					if($user['level'] == "Admin" OR $user['level'] == "Office"){
					?>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button>
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
									<th nowrap>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama Pelanggan&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
									<th nowrap>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Alamat&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
									<th nowrap>&emsp;&emsp;&emsp;Phone&emsp;&emsp;&emsp;</th>
									<th nowrap>&emsp;&emsp;&emsp;Layanan&emsp;&emsp;&emsp;</th>
									<th nowrap>Customer Account</th>
									<th>Customer Account Site</th>
									<th>Customer Account Nipnas</th>
									<th>Billing Account</th>
									<th>Billing Account Site</th>
									<th nowrap>&emsp;Nomor Quote&emsp;</th>
									<th nowrap>Nomor Aggrement</th>
									<th nowrap>&emsp;Nomor Order&emsp;</th>
									<th class="text-center">Sid</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
						</table>
					</div>
					<!-- End -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Sidebar Nama Pelanggan -->
<div class="custom-template">
			<div class="title">Nama Pelanggan</div>
			<div class="custom-content">
				<ul class="list-group">
					<?php
						$query = mysqli_query($koneksi, "SELECT nama_pel, COUNT(nama_pel) as jumlah FROM tb_pelanggan GROUP BY nama_pel HAVING COUNT(nama_pel) > 1");
						
						while ($pel = mysqli_fetch_array($query)) {

					?>
					<li class="list-group-item d-flex justify-content-between align-items-center">
					<?= $pel['nama_pel'] ?>
						<span class="badge badge-danger badge-pill"><?= $pel['jumlah'] ?></span>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-profile-1"></i>
			</div>
		</div>

<!-- Page Script -->
<script>
	
	// Custom File Value
	$(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	// Checkbox Checklist
	$('#ceksemua').change(function() {
        $(this).parents('#basic-datatables:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });

	// Delete By Checklist Function
	$(function() {
        $("#btnhapus").click(function() {
            id_array = new Array();
            i = 0;
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
			swal({
				title: 'Apakah Anda Yakin?',
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
		
	// Delete In Columns
	$('#basic-datatables').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Apakah Anda yakin?',
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

	// Display Datatables
	$(document).ready(function(){
		var table = $('#basic-datatables').DataTable({
			processing: true,
			serverSide: true,
			// "searching": false,
			// "ajax": "mod_pelanggan/fetchData.php",
			ajax: {
				"url": "mod_pelanggan/crud_pelanggan.php?pg=tampil",
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
			columnDefs: [ 
				{
				"targets": 0,
				"orderable": false,
				"sorting": false,
				},
				{
				"targets": 3,
				"orderable": false,
				},
				{
				"targets": 4,
				"orderable": false,
				},
				{
				"targets": 5,
				"orderable": false,
				},
				{
				"targets": 6,
				"orderable": false,
				},
				{
				"targets": 7,
				"orderable": false,
				},
				{
				"targets": 8,
				"orderable": false,
				},
				{
				"targets": 9,
				"orderable": false,
				},
				{
				"targets": 10,
				"orderable": false,
				},
				{
				"targets": 11,
				"orderable": false,
				},
				{
				"targets": 12,
				"orderable": false,
				},
				{
				"targets": 13,
				"orderable": false,
				},
				{
				"targets": 14,
				"orderable": false,
				},
				{
				"targets": 15,
				"orderable": false,
				},
			]
		});
		// Filter Search
		$('#search-filter').keyup( function() {
		table.search( this.value ).draw();
		} );
	});

	// Add Function
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

    //Import Data Function
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