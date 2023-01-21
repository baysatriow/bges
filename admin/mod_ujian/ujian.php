<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Ujian</h4>
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
				<a href="?pg=ujian">Data Ujian</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<!-- <button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button> -->
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
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
				                <form id="form-tambah">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Tambah Data Ujian</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label>Nama Ujian</label>
				                            <input type="text" name="nama" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>TGL MULAI</label>
				                            <input type="date" name="tgl_mulai" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>TGL AKHIR</label>
				                            <input type="date" name="tgl_akhir" class="form-control">
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
									<th>#</th>
									<th>Nama Ujian</th>
									<th>Tgl. Mulai</th>
									<th>Tgl. Akhir</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
		                            $query = mysqli_query($koneksi, "select * from ujian");
		                            $no = 0;
		                            while ($siswa = mysqli_fetch_array($query)) {
		                                $no++;
		                            ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $siswa['nama'] ?></td>
									<td><?= $siswa['tgl_mulai'] ?></td>
									<td><?= $siswa['tgl_akhir'] ?></td>
									<td>
										<?php if ($siswa['status'] == 0) { ?>
										<a href="#" data-id="<?= $siswa['id_ujian'] ?>" class="aktifkan badge badge-danger">TIDAK AKTIF</a>
										<?php } else { ?>
										<a href="#" data-id="<?= $siswa['id_ujian'] ?>" class="nonaktifkan badge badge-success">AKTIF</a>
										<?php } ?>
									</td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($siswa['id_ujian']) ?>"><i class="fas fa-info-circle"></i></button>
										<!-- Modal Here -->
										<div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($siswa['id_ujian']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-detail">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Ujian</b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
									                            <label>Nama Ujian</label>
									                            <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>TGL MULAI</label>
									                            <input type="date" name="nis" class="form-control" value="<?= $siswa['tgl_mulai'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>TGL AKHIR</label>
									                            <input type="date" name="nis" class="form-control" value="<?= $siswa['tgl_akhir'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>STATUS</label>
									                            
									                            <?php if ($siswa['status'] == 0) { ?>
									                            <a href="#" class="badge badge-danger">TIDAK AKTIF</a>
									                        	<?php } else { ?>
									                        	<a href="#" class="badge badge-success">AKTIF</a>
									                        	<?php } ?>	
									                        </div>
									                    </div>
									                    <div class="modal-footer">
									                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
										<!-- Modal End -->
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
	$('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_ujian/crud_ujian.php?pg=tambah',
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
            url: 'mod_siswa/crud_siswa.php?pg=import',
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
<!-- Scrip Ujian -->
<script>
	$('#basic-datatables').on('click', '.aktifkan', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan mengaktifkan ujian ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_ujian/crud_ujian.php?pg=aktifkan',
                    method: "POST",
                    data: 'id_ujian=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Ujian Berhasil di aktifkan',
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

    $('#basic-datatables').on('click', '.nonaktifkan', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menonaktifkan ujian ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_ujian/crud_ujian.php?pg=nonaktifkan',
                    method: "POST",
                    data: 'id_ujian=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Ujian Berhasil di nonaktifkan',
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
</script>