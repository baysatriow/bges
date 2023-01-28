<?php
require("../../config/database.php");

if ($_GET['action'] == "table_data"){

    $columns = array(
        0  => 'id_order', 
        1  => 'tgl_input',         
        2  => 'segmen',
        3  => 'nama_am',      
        4  => 'nama_pel',              
        5  => 'nomor_order',
        6  => 'date_end',
    );

    $querycount = $koneksi->query("SELECT count(id_order) as jumlah FROM tb_order INNER JOIN tb_pelanggan ON tb_order.no_order=tb_pelanggan.nomor_order INNER JOIN tb_am ON tb_order.nama_am=tb_am.nama_am");
    $datacount = $querycount->fetch_array();

    $totalData = $datacount['jumlah'];

    $totalFiltered = $totalData;

    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order = $columns[$_POST['order']['0']['column']];
    $dir = $_POST['order']['0']['dir'];

	// $query = $koneksi->query("SELECT * FROM tb_order INNER JOIN tb_pelanggan ON tb_order.no_order=tb_pelanggan.nomor_order INNER JOIN tb_am ON tb_order.nama_am=tb_am.nama_am ORDER BY $order $dir LIMIT $limit OFFSET $start");
    if (empty($_POST['search']['value'])) {
        $query = $koneksi->query("SELECT * FROM tb_order INNER JOIN tb_pelanggan ON tb_order.no_order=tb_pelanggan.nomor_order INNER JOIN tb_am ON tb_order.nama_am=tb_am.nama_am ORDER BY $order $dir LIMIT $limit OFFSET $start");

    } else {
        $search = $_POST['search']['value'];
        $query = $koneksi->query("SELECT * FROM tb_order INNER JOIN tb_pelanggan ON tb_order.no_order=tb_pelanggan.nomor_order INNER JOIN tb_am ON tb_order.nama_am=tb_am.nama_am 
	
		-- OR nama_am LIKE '%$search%' 
		WHERE nama_pel LIKE '%$search%'
		-- OR layanan LIKE '%$search%' 
		-- OR hrg_otc LIKE '%$search%' 
		-- OR hrg_mountly LIKE '%$search%' 
		-- OR status_lyn LIKE '%$search%' 
		-- OR ca LIKE '%$search%' 
		-- OR ca_site LIKE '%$search%' 
		-- OR ca_nipnas LIKE '%$search%' 
		-- OR ba LIKE '%$search%' 
		-- OR ba_site LIKE '%$search%' 
		-- OR nomor_quote LIKE '%$search%' 
		-- OR nomor_aggre LIKE '%$search%'
		OR nomor_order LIKE '%$search%'
	    OR segmen LIKE '%$search%' 
		-- OR status_order LIKE '%$search%'
		-- OR date_end LIKE '%$search%'
		-- OR date_prov LIKE '%$search%'
		-- OR order_lama LIKE '%$search%'
		-- OR sid LIKE '%$search%'
		-- OR ket LIKE '%$search%'
		ORDER BY $order $dir LIMIT $limit OFFSET $start");

        $querycount = $koneksi->query("SELECT count(id_order) as jumlah FROM tb_order INNER JOIN tb_pelanggan ON tb_order.no_order=tb_pelanggan.nomor_order INNER JOIN tb_am ON tb_order.nama_am=tb_am.nama_am WHERE nama_pel LIKE '%$search%'");

        $datacount = $querycount->fetch_array();
        $totalFiltered = $datacount['jumlah'];
    }
	
    $data = array();
    if (!empty($query)) {
        $no = $start + 1;
        while ($value = $query->fetch_array()) {
            $nestedData['no'] = $no;
            $nestedData['tgl_input'] 	= $value['tgl_input'];
			$nestedData['segmen'] 	 	= $value['segmen'];
			$nestedData['nama_am']  	= $value['nama_am'];
			$nestedData['nama_pel']  	= $value['nama_pel'];
			// $nestedData['layanan']  	= $value['layanan'];
			// $nestedData['hrg_otc']   	= $value['hrg_otc'];
			// $nestedData['hrg_mountly']  = $value['hrg_mountly'];
			// $nestedData['status_lyn'] 	= $value['status_lyn'];
			// $nestedData['ca'] 			= $value['ca'];
			// $nestedData['ca_site'] 		= $value['ca_site'];
			// $nestedData['ca_nipnas'] 	= $value['ca_nipnas'];
			// $nestedData['ba'] 			= $value['ba'];
			// $nestedData['ba_site'] 		= $value['ba_site'];
			// $nestedData['nomor_quote']  = $value['nomor_quote'];
			// $nestedData['nomor_aggre']  = $value['nomor_aggre'];
			$nestedData['nomor_order']  = $value['nomor_order'];
			// $nestedData['status_order'] = $value['status_order'];
			$nestedData['date_end'] 	= $value['date_end'];

			$tanggal_selesai = new DateTime($value['date_end']);
			$hari_ini = new DateTime('today');

			$y = $hari_ini->diff($tanggal_selesai)->y;

			// bulan
			$m = $hari_ini->diff($tanggal_selesai)->m;

			// hari
			$d = $hari_ini->diff($tanggal_selesai)->d;

			$hasil = $y . " year " . $m . " month " . $d . " day";
			$hasil2 = $m . " month " . $d . " day";
			$hasil3 = $d . " day";

			if ($hari_ini > $tanggal_selesai ){
				$nestedData['remaining'] 	= "<div class='badge badge-danger'>End</div>";
			}else if($d < 1 ){
				$nestedData['remaining'] 	= "<div class='badge badge-danger'>End</div>";
			}else if ($m < 1){
				$nestedData['remaining'] 	= $hasil3; 
			}else if ($y < 1){
				$nestedData['remaining'] 	= $hasil2;
			}else if($y >= 1){
				$nestedData['remaining'] 	= $hasil;
			}
			// $nestedData['date_prov'] 	= $value['date_prov'];
			// $nestedData['order_lama'] 	= $value['order_lama'];
			// $nestedData['sid'] 			= $value['sid'];
			// $nestedData['ket'] 			= $value['ket'];
            $nestedData['id_order'] 	= $value['id_order'];
			$nestedData['check_id'] 	= '<input type="checkbox" name="cekpilih[]" class="cekpilih" id="cekpilih-'.$no.'" value="'.$value['id_order'].'">';

            $nestedData['aksi'] = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail'.$no.'"><i class="fas fa-info-circle"></i></button>
                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editdata'.$no.'"><i class="fas fa-edit"></i></button>
                <button type="button" class="hapus btn btn-danger btn-xs"  data-id="'.$value['id_order'].'" >Hapus</button>
            </div>
            <div class="modal fade " id="detail'.$no.'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
				        <div class="modal-dialog modal-xl" role="dialog">
				            <div class="modal-content">
				                <form id="detail-data">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Detail Data Order </h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
										<div class="row">
											<div class="col col-lg-12">
												<div class="form-group">
													<label>Nomor Order</label>
													<input type="text" name="nomor_order" class="form-control" value="'.$value['nomor_order'].'" readonly>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label>Tanggal Input</label>
													<input type="text" name="tgl_input" class="form-control" value="'.$value['tgl_input'].'" readonly>
												</div>
												<div class="form-group">
													<label>Segmen</label>
													<input type="text" name="segmen" class="form-control" value="'.$value['segmen'].'" readonly>
												</div>
												<div class="form-group">
													<label>Nama AM</label>
													<input type="text" name="nama_am" class="form-control" value="'.$value['nama_am'].'" readonly>
												</div>
												<div class="form-group">
													<label>Layanan</label>
													<input type="text" name="layanan" class="form-control" value="'.$value['layanan'].'" readonly>
												</div>
												<div class="form-group">
													<label>Harga OTC</label>
													<input type="text" name="hrg_otc" class="form-control" value="'.$value['hrg_otc'].'" readonly>
												</div>
												<div class="form-group">
													<label>Harga Monthly</label>
													<input type="text" name="hrg_mountly" class="form-control" value="'.$value['hrg_mountly'].'" readonly>
												</div>
												<div class="form-group">
													<label>Status Layanan</label>
													<input type="text" name="status_lyn" class="form-control" value="'.$value['status_lyn'].'" readonly>
												</div>
												<div class="form-group">
													<label>Date End Of Contract</label>
													<input type="text" name="date_end" class="form-control" value="'.$value['date_end'].'" readonly>
												</div>
												<div class="form-group">
													<label>Contract Remaining </label>

												</div>
												<div class="form-group">
													<label>Date Prov Of Contract</label>
													<input type="text" name="date_prov" class="form-control" value="'.$value['date_prov'].'" readonly>
												</div>
												<div class="form-group">
													<label>SID</label>
													<input type="text" name="sid" class="form-control" value="'.$value['sid'].'" readonly>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label>Nama Pelanggan</label>
													<input type="text" name="nama_pel" class="form-control" value="'.$value['nama_pel'].'" readonly>
												</div>
												<div class="form-group">
													<label>Customer Account</label>
													<input type="text" name="ca" class="form-control" value="'.$value['ca'].'" readonly>
												</div>
												<div class="form-group">
													<label>Customer Account Site</label>
													<input type="text" name="ca_site" class="form-control" value="'.$value['ca_site'].'" readonly>
												</div>
												<div class="form-group">
													<label>Customer Account Nipnas</label>
													<input type="text" name="ca_nipnas" class="form-control" value="'.$value['ca_nipnas'].'" readonly>
												</div>
												<div class="form-group">
													<label>Billing Account</label>
													<input type="text" name="ba" class="form-control" value="'.$value['ba'].'" readonly>
												</div>
												<div class="form-group">
													<label>Billing Account Site</label>
													<input type="text" name="ba_site" class="form-control" value="'.$value['ba_site'].'" readonly>
												</div>
												<div class="form-group">
													<label>Nomor Quote</label>
													<input type="text" name="nomor_quote" class="form-control" value="'.$value['nomor_quote'].'" readonly>
												</div>
												<div class="form-group">
													<label>Nomor Aggrement</label>
													<input type="text" name="nomor_aggre" class="form-control" value="'.$value['nomor_aggre'].'" readonly>
												</div>
												<div class="form-group">
													<label>Nomor Order Lama</label>
													<input type="text" name="order_lama" class="form-control" value="'.$value['order_lama'].'" readonly>
												</div>
												<div class="form-group">
													<label>Status Order</label>
													<input type="text" name="status_order" class="form-control" value="'.$value['status_order'].'" readonly>
												</div>
												<div class="form-group">
													<label>Keterangan</label>
													<input type="text" name="ket" class="form-control" value="'.$value['ket'].'" readonly>
												</div>
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
                
                    <div class="modal fade" id="editdata'.$no.'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-xl" role="dialog">
							<div class="modal-content">
								<form action="mod_order/crud_order.php?pg=update" method="POST">
									<div class="modal-header">
										<h5 class="modal-title">Edit Data Order </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="row">
										<input type="hidden" name="id_order" class="form-control" value="'.$value['id_order'].'" readonly>
											<div class="col col-lg-12">
												<div class="form-group">
													<label>Nomor Order</label>
													<input type="text" name="nomor_order" class="form-control" value="'.$value['nomor_order'].'" readonly>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label>Tanggal Input</label>
													<input type="text" name="tgl_input" class="form-control" value="'.$value['tgl_input'].'" readonly>
												</div>
												<div class="form-group">
													<label>Segmen</label>
													<input type="text" name="segmen" class="form-control" value="'.$value['segmen'].'">
												</div>
												<div class="form-group">
													<label>Nama AM</label>
													<input type="text" name="nama_am" class="form-control" value="'.$value['nama_am'].'">
												</div>
												<div class="form-group">
													<label>Layanan</label>
													<input type="text" name="layanan" class="form-control" value="'.$value['layanan'].'" readonly>
												</div>
												<div class="form-group">
													<label>Harga OTC</label>
													<input type="text" name="hrg_otc" class="form-control" value="'.$value['hrg_otc'].'">
												</div>
												<div class="form-group">
													<label>Harga Monthly</label>
													<input type="text" name="hrg_mountly" class="form-control" value="'.$value['hrg_mountly'].'">
												</div>
												<div class="form-group">
													<label>Status Layanan</label>
													<input type="text" name="status_lyn" class="form-control" value="'.$value['status_lyn'].'">
												</div>
												<div class="form-group">
													<label>Date End Of Contract</label>
													<input type="date" name="date_end" class="form-control" value="'.$value['date_end'].'">
												</div>
												<div class="form-group">
													<label>Contract Remaining </label>
													<input type="text" name="date_end" class="form-control" value="Belum Selesai"  readonly>
												</div>
												<div class="form-group">
													<label>Date Prov Of Contract</label>
													<input type="date" name="date_prov" class="form-control" value="'.$value['date_prov'].'">
												</div>
												<div class="form-group">
													<label>SID</label>
													<input type="text" name="sid" class="form-control" value="'.$value['sid'].'">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label>Nama Pelanggan</label>
													<input type="text" name="nama_pel" class="form-control" value="'.$value['nama_pel'].'" readonly>
												</div>
												<div class="form-group">
													<label>Customer Account</label>
													<input type="text" name="ca" class="form-control" value="'.$value['ca'].'" readonly>
												</div>
												<div class="form-group">
													<label>Customer Account Site</label>
													<input type="text" name="ca_site" class="form-control" value="'.$value['ca_site'].'" readonly>
												</div>
												<div class="form-group">
													<label>Customer Account Nipnas</label>
													<input type="text" name="ca_nipnas" class="form-control" value="'.$value['ca_nipnas'].'" readonly>
												</div>
												<div class="form-group">
													<label>Billing Account</label>
													<input type="text" name="ba" class="form-control" value="'.$value['ba'].'" readonly>
												</div>
												<div class="form-group">
													<label>Billing Account Site</label>
													<input type="text" name="ba_site" class="form-control" value="'.$value['ba_site'].'" readonly>
												</div>
												<div class="form-group">
													<label>Nomor Quote</label>
													<input type="text" name="nomor_quote" class="form-control" value="'.$value['nomor_quote'].'" readonly>
												</div>
												<div class="form-group">
													<label>Nomor Aggrement</label>
													<input type="text" name="nomor_aggre" class="form-control" value="'.$value['nomor_aggre'].'" readonly>
												</div>
												<div class="form-group">
													<label>Nomor Order Lama</label>
													<input type="text" name="order_lama" class="form-control" value="'.$value['order_lama'].'" readonly>
												</div>
												<div class="form-group">
													<label>Status Order</label>
													<input type="text" name="status_order" class="form-control" value="'.$value['status_order'].'">
												</div>
												<div class="form-group">
													<label>Keterangan</label>
													<input type="text" name="ket" class="form-control" value="'.$value['ket'].'">
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
									<button type="submit" class="edit btn btn-dark" id="btnsimpan" data-id="'.$value['id_order'].'">Save</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
				    </div>
                    ';
            $data[] = $nestedData;
            $no++;
            ?> 
        <?php
        }
    }

    $json_data = [
        "draw"            => intval($_POST['draw']),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data"            => $data
    ];

    echo json_encode($json_data);
}