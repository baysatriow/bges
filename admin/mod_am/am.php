<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Account Manager</h4>
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
				<a href="?pg=am">Data Account Manager</a>
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
					<?php }
					else if($user['level'] == "office") {
					?>
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
				                        <h5 class="modal-title">Tambah Data AM</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label>Nama AM</label>
				                            <input type="text" name="nama_am" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>NIK</label>
				                            <input type="number" name="nik" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>Segmen</label>
											<select name="segmen" id="" class="form-control" required=''>
												<option value="DBS">DBS</option>
												<option value="DGS">DGS</option>
												<option value="DES">DES</option>
											</select>
				                    
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
							<thead align="center">
								<tr>
									<th><input type='checkbox' id='ceksemua'></th>
									<th>#</th>
									<th>Nama AM</th>
									<th>NIK</th>
									<th>Segmen</th>
									<th width="150px">Aksi</th>
								</tr>
							</thead>
							<tbody align="center">
								<?php
		                            $query = mysqli_query($koneksi, "select * from tb_am");
		                            $no = 0;
		                            while ($am = mysqli_fetch_array($query)) {
		                                $no++;
		                            ?>
								<tr>
									<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $am['id_am'] ?>"></td>
									<td><?= $no; ?></td>
									<td><?= $am['nama_am'] ?></td>
									<td><?= $am['nik'] ?></td>
									<td ><?=$am['segmen'] ?></td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($am['id_am']) ?>"><i class="fas fa-info-circle"></i></button>
										<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-edit<?= $no ?>"></i>Edit</button>
										<button type='button' class='btn btn-danger btn-xs' id='hapus' onclick="hapus('<?=($am['id_am']) ?>')" >Hapus</button>
										<!-- Modal Details Here -->
										<div class="modal fade bd-example-modal-lg" id="detail&id=<?=$am['id_am'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-detail">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail AM <b><?= $am['nama_am'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
									                            <label>Nama</label>
									                            <input type="text" name="nama_am" class="form-control" value="<?= $am['nama_am'] ?>" readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>NIK</label>
									                            <input type="number" name="nik" class="form-control" value="<?= $am['nik'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>Segmen</label>
									                            <input type="text" name="segmen" class="form-control" value="<?= $am['segmen'] ?>"readonly>
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

										<!-- Modal Edit Here -->
										<div class="modal fade bd-example-modal-lg" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-edit<?= $no ?>">
									                    <div class="modal-header" >
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Edit AM <b><?= $am['nama_am'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
																<input type="hidden" name="id_am" value="<?php echo $am['id_am'] ?>">
									                            <label>Nama</label>
									                            <input type="text" name="nama_am" class="form-control" value="<?= $am['nama_am'] ?>">
									                        </div>
									                        <div class="form-group">
									                            <label>NIK</label>
									                            <input type="number" name="nik" class="form-control" value="<?= $am['nik'] ?>">
									                        </div>
									                        <div class="form-group">
									                            <label>Segmen</label>
									                            <input type="text" name="segmen" class="form-control" value="<?= $am['segmen'] ?>">
									                        </div>
									                    </div>
									                    <div class="modal-footer">
															<button type="submit" class="btn btn-dark" id="btnsimpan">Save</button>
									                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
										<!-- Modal End -->
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
	// Checklist Box Delete Check
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
            $.ajax({
                url: "mod_am/crud_am.php?pg=hapusdaftar",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
					
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
                        })
                    }setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
            return false;
        })
    });

	// Delete Record By id
	function hapus(id) {
		$.ajax({
			type: 'POST',
			data: 'id='+id,
			url: 'mod_am/crud_am.php?pg=hapus',
			success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil di Hapus',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#tambahdata').modal('hide');
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal dihapus',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
			});
		}

	// Add Record 
	$('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_am/crud_am.php?pg=tambah',
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

	// Edit
	

</script>
<!-- End -->