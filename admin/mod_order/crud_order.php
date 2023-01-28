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
if ($pg == 'update') {
    $id = $_POST['id_order'];
    $data = [
        'tgl_input'       => $_POST['tgl_input'],
        'nama_am'         => $_POST['nama_am'],
        'hrg_otc'         => $_POST['hrg_otc'],
        'hrg_mountly'     => $_POST['hrg_mountly'],
        'status_lyn'      => $_POST['status_lyn'],
        'status_order'    => $_POST['status_order'],
        'date_end'        => $_POST['date_end'],
        'date_prov'       => $_POST['date_prov'],
        'order_lama'      => $_POST['order_lama'],
        'ket'             => $_POST['ket'],
        'no_order'        => $_POST['nomor_order'],
    ];

    $exec = update($koneksi, 'tb_order', $data, ['id_order' => $id]);

    header("Location: ../?pg=order&pesan=sukses");  
}
if ($pg == 'tambah') {
    $data = [
        'tgl_input'       => $_POST['tgl_input'],
        'nama_am'         => $_POST['nama_am'],
        'hrg_otc'         => $_POST['hrg_otc'],
        'hrg_mountly'     => $_POST['hrg_mountly'],
        'status_lyn'      => $_POST['status_lyn'],
        'status_order'    => $_POST['status_order'],
        'date_end'        => $_POST['date_end'],
        'date_prov'       => $_POST['date_prov'],
        'order_lama'      => $_POST['order_lama'],
        'ket'             => $_POST['ket'],
        'no_order'        => $_POST['nomor_order'],
    ];
    $exec = insert($koneksi, 'tb_order', $data);
    if($exec){
        echo "OK";
    }


}

if ($pg == 'auto_pel') {
    //variabel no_order yang dikirimkan form.php
    $nomor_order= $_GET['nomor_order'];

    //mengambil data
    $query = mysqli_query($koneksi, "select * from tb_pelanggan where nomor_order='$nomor_order'");
    $order = mysqli_fetch_array($query);
    $data = array(
                'nomor_order'  =>  @$order['nomor_order'],        
                'nama_pel'     =>  @$order['nama_pel'],
                'layanan'      =>  @$order['layanan'],
                'ca'           =>  @$order['ca'],
                'ca_site'      =>  @$order['ca_site'],
                'ca_nipnas'    =>  @$order['ca_nipnas'],
                'ba'           =>  @$order['ba'],
                'ba_site'      =>  @$order['ba_site'],
                'nomor_quote'  =>  @$order['nomor_quote'],
                'nomor_aggre'  =>  @$order['nomor_aggre'],
                'sid'          =>  @$order['sid'],
            );
               
    //tampil data
    echo json_encode($data);
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

            mysqli_query($koneksi, "truncate sekolah");
            for ($i = 3; $i <= $hasildata; $i++) {
                $tgl_input=addslashes($data->val($i,2));
                $nama_am=addslashes($data->val($i,3));
                $hrg_otc=addslashes($data->val($i,4));
                $hrg_mountly=addslashes($data->val($i,5));
                $status_lyn=addslashes($data->val($i,6));
                $status_order=addslashes($data->val($i,7));
                $date_end=addslashes($data->val($i,8));
                $date_prov=addslashes($data->val($i,9));
                $order_lama=addslashes($data->val($i,10));
                $ket=addslashes($data->val($i,11));
                $no_order=addslashes($data->val($i,12));

                    $datax = [
                        'tgl_input'       => $tgl_input,
                        'nama_am'         => $nama_am,
                        'hrg_otc'         => $hrg_otc,
                        'hrg_mountly'     => $hrg_mountly,
                        'status_lyn'      => $status_lyn,
                        'status_order'    => $status_order,
                        'date_end'        => $date_end,
                        'date_prov'       => $date_prov,
                        'order_lama'      => $order_lama,
                        'ket'             => $ket,
                        'no_order'        => $no_order,
                        
                        // 'status'=> 1
                    ];
                    $exec = insert($koneksi, 'tb_order', $datax);
                    ($exec) ? $sukses++ : $gagal++;
                
            }
            $total = $hasildata - 2;
            echo "Berhasil: $sukses | Gagal: $gagal | Dari: $total";
        }
    } else {
        echo "gagal";
    }
}

// Hapus 1 Data Berdasarkan ID
if ($pg == 'hapus') {

    $id=$_POST['id_pel'];
    // $hapus = mysql_query("delete from tb_am where id=".$id." ");
    $query = mysqli_query($koneksi, "DELETE from  tb_order where id_order=".$id." ");
    if($query) {
        echo "OK";
    } else {
        // 
    }
}

if ($pg == 'hapusdaftar') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from tb_order where id_order in (" . $kode . ")");
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}