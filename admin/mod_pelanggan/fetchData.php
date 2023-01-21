<?php 
// Tests
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'order_crm' 
); 
 
// DB table to use 
$table = 'tb_pelanggan'; 
 
// Table's primary key 
$primaryKey = 'id_pel'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'id_pel', 'dt' => 0 ),
    array( 'db' => 'nama_pel', 'dt' => 1 ), 
    array( 'db' => 'layanan',  'dt' => 2 ), 
    array( 'db' => 'ca',      'dt' => 3 ), 
    array( 'db' => 'ca_site',     'dt' => 4 ), 
    array( 'db' => 'ca_nipnas',    'dt' => 5 ), 
    array( 'db' => 'ba',    'dt' => 6 ), 
    array( 'db' => 'ba_site',    'dt' => 7 ), 
    array( 'db' => 'nomor_quote',    'dt' => 8 ), 
    array( 'db' => 'nomor_aggre',    'dt' => 9 ), 
    array( 'db' => 'nomor_order',    'dt' => 10 ), 
    array( 'db' => 'sid',    'dt' => 11 ), 
    array( 'db' => 'alamat',    'dt' => 12 ), 
    array( 'db' => 'phone',    'dt' => 13 ), 
      array(  'db' => 'id_pel',
            'dt' => 14,

            // kalo kalian mau bikin tombol edit pake 'formatter' => function($d, $row) {return ....}
            // kalian bisa custom dengan menggunakan class bootstrap untuk mempercantik tampilan
            'formatter' => function($d, $row) {
                return "
                <button type='button' class='btn btn-danger btn-xs'><i class='fas fa=trash'>Hapus</i></button>";
            }
         ),
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);