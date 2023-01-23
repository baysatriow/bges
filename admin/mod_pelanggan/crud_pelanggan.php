<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/function_sekolah.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if($pg == 'tampil'){

    $columns = array(
        0  => 'id_pel', 
        1  => 'nama_pel',         
        2  => 'alamat',                   
        3  => 'phone',        
        4  => 'layanan',              
        5  => 'ca',                   
        6  => 'ca_site',           
        7  => 'ca_nipnas',      
        8  => 'ba',   
        9  => 'ba_site',   
       10  => 'nomor_quote',     
       11  => 'nomor_aggre',            
       12  => 'nomor_order',         
       13  => 'sid',
    );

    $querycount = $db->query("SELECT count(id_pel) as jumlah FROM tb_pelanggan");
    $datacount = $querycount->fetch_array();

    $totalData = $datacount['jumlah'];

    $totalFiltered = $totalData;

    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order = $columns[$_POST['order']['0']['column']];
    $dir = $_POST['order']['0']['dir'];

    if (empty($_POST['search']['value'])) {
        $query = $db->query("SELECT id_pel,nama_pel,alamat,phone,layanan FROM tb_pelanggan ORDER BY $order $dir LIMIT $limit OFFSET $start");

    } else {
        $search = $_POST['search']['value'];
        $query = $db->query("SELECT id_pel,nama_pel,alamat,phone,layanan FROM tb_pelanggan WHERE nama_pel LIKE '%$search%' OR layanan LIKE '%$search%' ORDER BY $order $dir LIMIT $limit OFFSET $start");

        $querycount = $db->query("SELECT count(id_pel) as jumlah FROM tb_pelanggan WHERE nama_pel LIKE '%$search%' OR layanan LIKE '%$search%'");

        $datacount = $querycount->fetch_array();
        $totalFiltered = $datacount['jumlah'];
    }

    $data = array();
    if (!empty($query)) {
        $no = $start + 1;
        while ($value = $query->fetch_array()) {
            $nestedData['no'] = $no;
            $nestedData['nama_pel'] = $value['nama_pel'];
            $nestedData['alamat'] = $value['alamat'];
            $nestedData['phone'] = $value['phone'];
            $nestedData['layanan'] = $value['layanan'];
            $nestedData['aksi'] = '';
            $data[] = $nestedData;
            $no++;
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
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_sekolah' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'status' => $status
    ];
    $npsn = $_POST['npsn'];
    $exec = update($koneksi, 'sekolah', $data, ['npsn' => $npsn]);
    echo $exec;
}
if ($pg == 'tambah') {
    $data = [
        'nama_pel'          => $_POST['nama_pel'],
        'layanan'           => $_POST['layanan'],
        'ca'                => $_POST['ca'],
        'ca_site'           => $_POST['ca_site'],
        'ca_nipnas'         => $_POST['ca_nipnas'],
        'ba'                => $_POST['ba'],
        'ba_site'           => $_POST['ba_site'],
        'nomor_quote'       => $_POST['nomor_quote'],
        'nomor_aggre'       => $_POST['nomor_aggre'],
        'nomor_order'       => $_POST['nomor_order'],
        'sid'               => $_POST['sid'],
        'alamat'            => $_POST['alamat'],
        'phone'             => $_POST['phone'],
    ];
    $exec = insert($koneksi, 'tb_pelanggan', $data);
    echo $exec;
}
if ($pg == 'import') {
    if (isset($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = explode('.', $file);
        $ext = end($ext);
        if ($ext <> 'xls') {
            echo "harap pilih file excel .xls";
        } else {
            $data = new Spreadsheet_Excel_Reader($temp);
            $hasildata = $data->rowcount($sheet_index = 0);
            $sukses = $gagal = 0;

            // mysqli_query($koneksi, "truncate tb_pelanggan");
            for ($i = 3; $i <= $hasildata; $i++) {
                $nama_pel=addslashes($data->val($i, 2));
                $layanan=addslashes($data->val($i,3));
                $ca=addslashes($data->val($i,4));
                $ca_site=addslashes($data->val($i,5));
                $ca_nipnas=addslashes($data->val($i,6));
                $ba=addslashes($data->val($i,7));
                $ba_site=addslashes($data->val($i,8));
                $nomor_quote=addslashes($data->val($i,9));
                $nomor_aggre=addslashes($data->val($i,10));
                $nomor_order=addslashes($data->val($i,11));
                $sid=addslashes($data->val($i,12));
                $alamat=addslashes($data->val($i,13));
                $phone=addslashes($data->val($i,14));
                
                    $datax = [
                        'nama_pel'          => $nama_pel,
                        'layanan'           => $layanan,
                        'ca'                => $ca,
                        'ca_site'           => $ca_site,
                        'ca_nipnas'         => $ca_nipnas,
                        'ba'                => $ba,
                        'ba_site'           => $ba_site,
                        'nomor_quote'       => $nomor_quote,
                        'nomor_aggre'       => $nomor_aggre,
                        'nomor_order'       => $nomor_order,
                        'sid'               => $sid,
                        'alamat'            => $alamat,
                        'phone'             => $phone,
                        // 'status'=> 1
                    ];
                    $exec = insert($koneksi, 'tb_pelanggan', $datax);
                    ($exec) ? $sukses++ : $gagal++;
                
            }
            $total = $hasildata - 2;
            echo "Berhasil: $sukses | Gagal: $gagal | Dari: $total";
        }
    } else {
        echo "gagal";
    }
}

// Hapus Per Record
if ($pg == 'hapus') {

    $id=$_POST['id_pel'];
    // $hapus = mysql_query("delete from tb_am where id=".$id." ");
    $query = mysqli_query($koneksi, "DELETE from tb_pelanggan where id_pel=".$id." ");
    if($query) {
        echo "OK";
    } else {
        // 
    }
}

if ($pg == 'hapusdaftar') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from tb_pelanggan where id_pel in (" . $kode . ")");
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}