<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Order</h4>
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
				<a href="?pg=order">Data Order</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				<?php 
					if($user['level'] == "Admin"){
					?>
					<!-- <button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button> -->
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
					<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
					<?php }
					else if($user['level'] == "Office") {
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
				                        <h5 class="modal-title">Tambah Data Order</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label>Tanggal Input</label>
				                            <input type="date" name="tgl_input" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>Segmen</label>
				                            <!-- <input type="number" name="segmen" class="form-control" required=""> -->
											<select name="segmen" id="" class="form-control" required=''>
												<option value="DBS">DBS</option>
												<option value="DGS">DGS</option>
												<option value="DES">DES</option>
											</select>
				                        </div>
										<div class="form-group">
				                            <label>Nama AM</label>
											<select type="text" id="nama_am_search" name="nama_am" class="form-control selectpicker" data-live-search="true" required=''>
													<?php 
													// Fetch Nomor_order
													$nama_am_query = "SELECT * FROM tb_am";
													$nama_am_data = mysqli_query($koneksi,$nama_am_query);
													while($row = mysqli_fetch_assoc($nama_am_data) ){
														
														$nama_am = $row['nama_am'];
														
														// Option
														echo "<option value='".$nama_am."' >".$nama_am."</option>";
													}
													?>
													</select>
				                        </div>
										<div class="form-group">
				                            <label>Nama Pelanggan</label>
				                            <input type="text" name="nama_pel" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Layanan</label>
				                            <input type="text" name="layanan" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Harga OTC</label>
				                            <input type="text" name="hrg_otc" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Harga Monthly</label>
				                            <input type="text" name="hrg_otc" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Status Layanan</label>
				                            <input type="text" name="status_lyn" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Customer Account</label>
				                            <input type="text" name="ca" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Customer Account Site</label>
				                            <input type="text" name="ca_site" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Customer Account Nipnas</label>
				                            <input type="text" name="ca_nipnas" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Billing Account</label>
				                            <input type="text" name="ba" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Billing Account Site</label>
				                            <input type="text" name="ba_site" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Nomor Quote</label>
				                            <input type="text" name="nomor_quote" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Nomor Aggrement</label>
				                            <input type="text" name="nomor_aggrement" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Nomor Order</label>
											<select type="text" id="nomor_order" name="nomor_order" class="form-control selectpicker"  data-live-search="true" required=''>
													<?php 
													// Fetch Nomor_order
													$nomor_order_query = "SELECT * FROM tb_pelanggan";
													$nomor_order_data = mysqli_query($koneksi,$nomor_order_query);
													while($row = mysqli_fetch_assoc($nomor_order_data) ){
														
														$nomor_order = $row['nomor_order'];
														
														// Option
														echo "<option value='".$nomor_order."' >".$nomor_order."</option>";
													}
													?>
													</select>
				                        </div>
										<div class="form-group">
				                            <label>Status Order</label>
				                            <input type="text" name="status_order" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Date End Of Contract</label>
				                            <input type="text" name="date_end" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Date Prov Of Contract</label>
				                            <input type="text" name="date_prov" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Nomor Order Lama</label>
				                            <input type="text" name="order_lama"  onchange="isi_otomatis()" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Sid</label>
				                            <input type="text" name="sid" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Keterangan</label>
				                            <input type="text" name="ket" class="form-control" required="">
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
							<thead align="center">
								<tr>
									<th><input type='checkbox' id='ceksemua'></th>
									<th>#</th>
									<th>Tanggal Input</th>
									<th>Segmen</th>
									<th>Nama AM</th>
									<th>Nama Pelanggan</th>
									<th>Layanan</th>
									<th>Harga OTC</th>
									<th>Harga Monthly</th>
									<th>Status Layanan</th>
									<th>Customer Account</th>
									<th>Customer Account Site</th>
									<th>Customer Account Nipnas</th>
									<th>Billing Account</th>
									<th>Billing Account Site</th>
									<th>Nomor Quote</th>
									<th>Nomor Aggrement</th>
									<th>Nomor Order</th>
									<th>Status Order</th>
									<th>Date End Of Contract</th>
									<th>Contract Remaining</th>
									<th>Date Prov of Contract</th>
									<th>Nomor Order Lama</th>
									<th>Sid</th>
									<th>Keterangan</th>
									<th>Aksi</th>
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
<!-- Page Script -->
<script>

$(document).ready(function(){
    $('#basic-datatables').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "mod_order/fetchData.php"
		
    });
	});
	// Experiment Autofill
	function isi_otomatis(){
                var order_lama = $("#order_lama").val();
                $.ajax({
                    url: "mod_order/crud_order.php?pg=autofill",
                    data:"order_lama="+order_lama ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#order_lama').val(obj.order_lama);
					$('#nama_pel').val(obj.nama_pel);
                });
            }

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
                url: "mod_order/crud_order.php?pg=hapusdaftar",
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
	$('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_order/crud_order.php?pg=tambah',
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
	$('#form-edit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_order/crud_order.php?pg=editdata',
            data: $(this).serialize(),
            success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil diubah',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#editdata').modal('hide');
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal diubah',
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
            url: 'mod_order/crud_order.php?pg=import',
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