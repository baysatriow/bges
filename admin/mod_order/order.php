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
				                            <small id="helpfile" class="form-text text-muted">File harus .xls</small>
				                        </div>
										<div class="form-group">
											<a class="text-light btn btn-success btn-sm" href="../assets/uploaded/template_excel/template_order.xls" >Download Template Excel</a>
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
				                            <label>Segmen</label>
				                            <!-- <input type="number" name="segmen" class="form-control" required=""> -->
											<select name="segmen" id="" class="form-control" required=''>
												<option value="DBS">DBS</option>
												<option value="DGS">DGS</option>
												<option value="DES">DES</option>
											</select>
				                        </div>
										<div class="form-group">
				                            <label>Nomor Order</label>
											<!-- <input type="text" id="nomor_order" name="nomor_order" class="form-control" onchange="auto_pelanggan()" autocomplete="off" placeholder="Isi Otomatis" required autofocus><br/> -->
											<select type="text" name="nomor_order" id="nomor_order" class="form-control selectpicker" onchange="auto_pelanggan()" autocomplete="off" data-live-search="true" required autofocus>
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
				                            <label>Nama Pelanggan</label>
				                            <input type="text" id="nama_pel" name="nama_pel" class="form-control" autocomplete="on" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Customer Account</label>
				                            <input type="text" id="ca" name="ca" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Customer Account Site</label>
				                            <input type="text" id="ca_site" name="ca_site" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Customer Account Nipnas</label>
				                            <input type="text" id="ca_nipnas" name="ca_nipnas" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Billing Account</label>
				                            <input type="text" id="ba" name="ba" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Billing Account Site</label>
				                            <input type="text" id="ba_site" name="ba_site" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Nomor Quote</label>
				                            <input type="text" id="nomor_quote" name="nomor_quote" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Nomor Aggrement</label>
				                            <input type="text" id="nomor_aggre" name="nomor_aggre" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Sid</label>
				                            <input type="text" id="sid" name="sid" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Layanan</label>
				                            <input type="text" id="layanan" name="layanan" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Harga OTC</label>
				                            <input type="text" name="hrg_otc" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Harga Monthly</label>
				                            <input type="text" name="hrg_mountly" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Status Layanan</label>
				                            <input type="text" name="status_lyn" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Status Order</label>
				                            <input type="text" name="status_order" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Date End Of Contract</label>
				                            <input type="date" name="date_end" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Date Prov Of Contract</label>
				                            <input type="date" name="date_prov" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Nomor Order Lama</label>
				                            <input type="text" name="order_lama"class="form-control" required="">
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
									<th nowrap>Tanggal Input</th>
									<th>Segmen</th>
									<th>Nama AM</th>
									<th nowrap>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama Pelanggan&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
									<th>Layanan</th>
									<th nowrap>&emsp;&emsp;&emsp;&emsp;Harga OTC&emsp;&emsp;&emsp;&emsp;</th>
									<th nowrap>&emsp;&emsp;&emsp;&emsp;Harga Monthly&emsp;&emsp;&emsp;&emsp;</th>
									<th nowrap>Status Layanan</th>
									<th nowrap>Customer Account</th>
									<th nowrap>CA Site</th>
									<th nowrap>CA Nipnas</th>
									<th nowrap>Billing Account</th>
									<th nowrap>Billing Account Site</th>
									<th nowrap>&emsp;Nomor Quote&emsp;</th>
									<th nowrap>Nomor Aggrement</th>
									<th nowrap>&emsp;Nomor Order&emsp;</th>
									<th nowrap>Status Order</th>
									<th nowrap>Date End Of Contract</th>
									<th>Contract Remaining</th>
									<th nowrap>Date Prov of Contract</th>
									<th nowrap>Nomor Order Lama</th>
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
	// Custom File Value
	$(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	// Experiment Autofill
	function auto_pelanggan(){
                var nomor_order = $("#nomor_order").val();
                $.ajax({
                    url: 'mod_order/crud_order.php?pg=auto_pel',
                    data:"nomor_order="+nomor_order ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nomor_order').val(obj.nomor_order);
                    $('#nama_pel').val(obj.nama_pel);
                    $('#layanan').val(obj.layanan);
					$('#ca').val(obj.ca);
					$('#ca_site').val(obj.ca_site);
					$('#ca_nipnas').val(obj.ca_nipnas);
					$('#ba').val(obj.ba);
					$('#ba_site').val(obj.ba_site);
					$('#nomor_quote').val(obj.nomor_quote);
					$('#nomor_aggre').val(obj.nomor_aggre);
					$('#sid').val(obj.sid);
                });
            }


			$(document).ready(function(){
			var table = $('#basic-datatables').DataTable({
			processing: true,
			serverSide: true,
			
			"ajax": "mod_order/fetchData.php",
			// ajax: {
			// 	"url": "mod_order/fetchDatas.php?action=table_data",
			// 	"dataType": "json",
			// 	"type": "POST"
			// },
			// columns:[
			// 	{"data": "check_id"},
			// 	{"data": "no"},
			// 	{"data": "tgl_input"},
			// 	{"data": "segmen"},
			// 	{"data": "nama_am"},
			// 	{"data": "nama_pel"},
			// 	{"data": "layanan"},
			// 	{"data": "hrg_otc"},
			// 	{"data": "hrg_mountly"},
			// 	{"data": "status_lyn"},
			// 	{"data": "ca"},
			// 	{"data": "ca_site"},
			// 	{"data": "ca_nipnas"},
			// 	{"data": "ba"},
			// 	{"data": "ba_site"},
			// 	{"data": "nomor_quote"},
			// 	{"data": "nomor_aggre"},
			// 	{"data": "nomor_order"},
			// 	{"data": "status_order"},
			// 	{"data": "date_end"},
			// 	{"data": "remaining"},
			// 	{"data": "date_prov"},
			// 	{"data": "order_lama"},
			// 	{"data": "sid"},
			// 	{"data": "ket"},
			// 	{"data": "aksi"},
			// ],
			// "columnDefs": [ 
			// 	{
			// 		"targets": 0,
			// 		"orderable": false,
			// 	},
			// 	{
			// 		"targets": 7,
			// 		"render": $.fn.dataTable.render.number( '.', '', '', 'Rp. ' )
					
			// 	},
			// 	{
			// 		"targets": 8,
			// 		"render": $.fn.dataTable.render.number( '.', '', '', 'Rp. ' )
					
			// 	},
			// 	{
			// 		"targets": 20,
			// 		"className": "text-center",
			// 	}
			// ]
		});
		// Filter Search
		// $('#search-filter').keyup( function() {
		// table.search( this.value ).draw();
		// } );
		// $('#search-layanan').keyup( function() {
		// table.search( this.value ).draw();
		// } );
		// table.on('draw.dt', function () {
		// 		var info = table.page.info();
		// 		table.column(, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
		// 			cell.innerHTML = i + 1 + info.start;
		// 		});
		// 	});
	});
// $(document).ready(function(){
	
// 	// Table Tampil
// 	var table = $('#basic-datatables').DataTable( { 
// 		         "processing": true,
// 		         "serverSide": true,
// 		         "ajax": "mod_order/fetchData.php",
// 		         "columnDefs": 
// 		         [
// 		         	{
// 		         	 	"targets": 6,
// 		             	"render": $.fn.dataTable.render.number( '.', '', '', 'Rp. ' )
		             
// 		         	},
// 		         	{
// 		         	 	"targets": 7,
// 		             	"render": $.fn.dataTable.render.number( '.', '', '', 'Rp. ' )
		             
// 		         	},
// 					{
// 						"searchable" : false,
// 						"orderable"  : false,
// 		         		"targets": 24,
// 						"render" : function( data, type, row) {
// 							var btn = "<center><button class=\"btn btn-success btn-xs\" data-toggle=\"modal\" data-target=\"#editdata\"><i class=\"fas fa-edit\"></i></button> <button class=\"btn btn-success btn-xs\" data-toggle=\"modal\" data-target=\"#detail&id="+data+"\"> <i class=\"fas fa-edit\"></i></button>";
// 							return btn;
// 						}
// 		             	// "defaultContent": "<center><button class='btn btn-success btn-xs' data-toggle='modal' data-target='#editdata'><i class='fas fa-edit'></i></button> <button class='btn btn-success btn-xs' data-toggle='modal' data-target='#detail&id'+ data +''><i class='fas fa-edit'></i></button>" 
// 		         	},
// 		        ],
// 				// "columns": [
// 				// 	{"data":null,
			
// 				// 	"defaultContent": '<label class="checkbox checkbox-lg"> </label>',
// 				// 	},
// 				// 	{
// 				// 	"data": "id",
// 				// 	"render": function ( data, type, row, meta ) {
// 				// 	return '<a href="'+ data +'"><i style="font-size: 1.50rem !important;" class="fa fa-download"></i></a>';
// 				// 	},
// 				// }
// 				// ],
// 		    });

// 			table.on('draw.dt', function () {
// 	            var info = table.page.info();
// 	            table.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
// 	                cell.innerHTML = i + 1 + info.start;
// 	            });
// 	        });
// 	});

	
	


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

	// Add Data
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