<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'order_crm' 
); 
 
// DB table to use 
// $table = 'tb_order'; 
// $table = <<<EOT
//  (
//     SELECT
//       a.id_order,
//       a.tgl_input,
//       b.segmen
//       a.nama_am
//     FROM tb_order a
//     LEFT JOIN tb_am b ON a.nama_am = b.nama_am
//  ) temp
// EOT;
$table = <<<EOT
(
   SELECT 
     a.id_order, 
     a.tgl_input, 
     c.segmen, 
     a.nama_am, 
     b.nama_pel, 
     b.layanan, 
     a.hrg_otc, 
     a.hrg_mountly, 
     a.status_lyn,
     b.ca,
     b.ca_site,
     b.ca_nipnas,
     b.ba,
     b.ba_site,
     b.nomor_quote,
     b.nomor_aggre,
     b.nomor_order,
     a.status_order,
     a.date_end,
     a.date_prov,
     a.order_lama,
     b.sid,
     a.ket
   FROM tb_order a
   INNER JOIN tb_pelanggan b ON a.no_order = b.nomor_order
   INNER JOIN tb_am c ON a.nama_am = c.nama_am
) temp
EOT;

// Table's primary key 
$primaryKey = 'id_order'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'id_order', 'dt' => 0 ),
    array( 'db' => 'tgl_input', 'dt' => 1 ), 
    // array( 
    //     'db'        => 'tgl_input', 
    //     'dt'        => 1, 
    //     'formatter' => function( $d, $row ) { 
    //         return date( 'Y-m-d', strtotime($d)); 
    //     } 
    // ),
    array( 'db' => 'segmen', 'dt' => 2 ), 
    array( 'db' => 'nama_am', 'dt' => 3 ),
    array( 'db' => 'nama_pel', 'dt' => 4 ),
    array( 'db' => 'layanan', 'dt' => 5 ),
    array( 'db' => 'hrg_otc', 'dt' => 6 ),
    array( 'db' => 'hrg_mountly', 'dt' => 7 ),
    array( 'db' => 'status_lyn', 'dt' => 8 ),
    array( 'db' => 'ca', 'dt' => 9 ),
    array( 'db' => 'ca_site', 'dt' => 10 ),
    array( 'db' => 'ca_nipnas', 'dt' => 11 ),
    array( 'db' => 'ba', 'dt' => 12 ),
    array( 'db' => 'ba_site', 'dt' => 13 ),
    array( 'db' => 'nomor_quote', 'dt' => 14 ),
    array( 'db' => 'nomor_aggre', 'dt' => 15 ),
    array( 'db' => 'nomor_order', 'dt' => 16 ),
    array( 'db' => 'status_order', 'dt' => 17 ),
    array( 'db' => 'date_end', 'dt' => 18 ),
    array( 'db' => 'date_end', 'dt' => 19 ),  
    array( 'db' => 'date_prov', 'dt' => 20 ),
    array( 'db' => 'order_lama', 'dt' => 21 ),
    array( 'db' => 'sid', 'dt' => 22 ),
    array( 'db' => 'ket', 'dt' => 23 ),
    // array( 'db' => 'id_order', 'dt' => 24 ),
    array( 'db' => 'id_order',
           'dt' => 24,

            // kalo kalian mau bikin tombol edit pake 'formatter' => function($d, $row) {return ....}
            // kalian bisa custom dengan menggunakan class bootstrap untuk mempercantik tampilan
            'formatter' => function($d, $row) {
                return '<div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail'.$d.'"><i class="fas fa-info-circle"></i></button>
                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editdata'.$d.'"><i class="fas fa-edit"></i></button>
            </div>
   
            <div class="modal fade" id="detail'.$d.'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				        <div class="modal-dialog" role="document">
				            <div class="modal-content">
				                <form id="form-tambah">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Tambah Data Pelanggan</h5>
				                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label>Nama Pelanggan</label>
				                            <input type="text" name="nama_pel" class="form-control"  readonly>
				                        </div>
				                        <div class="form-group">
				                            <label>Alamat</label>
				                            <input type="text" name="alamat" class="form-control"  readonly>
				                        </div>
				                        <div class="form-group">
				                            <label>Phone</label>
				                            <input type="text" name="phone" class="form-control"  readonly>
				                        </div>
										<div class="form-group">
				                            <label>Layanan</label>
				                            <input type="text" name="layanan" class="form-control"  readonly>
				                        </div>
										<div class="form-group">
				                            <label>Customer Account</label>
				                            <input type="text" name="ca" class="form-control"  readonly>
				                        </div>
										<div class="form-group">
				                            <label>Customer Account Site</label>
				                            <input type="text" name="ca_site" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Customer Account Nipnas</label>
				                            <input type="text" name="ca_nipnas" class="form-control" readonly>
				                        </div>
										<div class="form-group">
				                            <label>Billing Account</label>
				                            <input type="text" name="ba" class="form-control"  readonly>
				                        </div>
										<div class="form-group">
				                            <label>Billing Account Site</label>
				                            <input type="text" name="ba_site" class="form-control"  readonly>
				                        </div>
										<div class="form-group">
				                            <label>Nomor Quote</label>
				                            <input type="text" name="nomor_quote" class="form-control"  readonly>
				                        </div>
										<div class="form-group">
				                            <label>Nomor Aggrement</label>
				                            <input type="text" name="nomor_aggre" class="form-control"  readonly>
				                        </div>
										<div class="form-group">
				                            <label>Nomor Order</label>
				                            <input type="text" name="nomor_order" class="form-control"  readonly>
				                        </div>
										<div class="form-group">
				                            <label>Sid</label>
				                            <input type="text" name="sid" class="form-control"  readonly>
				                        </div>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				                    </div>
				                </form>
				            </div>
				        </div>
				    </div>
         
                    ';
            }
         ),
); 
 
// Include SQL query processing class 
require("../../config/ssp.php"); 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);