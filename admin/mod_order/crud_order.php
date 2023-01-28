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
            for ($i = 2; $i <= $hasildata; $i++) {
                $no_daftar=$data->val($i, 2);
                $nik=addslashes($data->val($i,3));
                $nisn=addslashes($data->val($i,4));
                $nama=addslashes($data->val($i,5));
                $foto=addslashes($data->val($i,6));
                $jenkel=addslashes($data->val($i,7));
                $tempat_lahir=addslashes($data->val($i,8));
                $tgl_lahir=addslashes($data->val($i,9));
                $kelas=addslashes($data->val($i,10));
                $jurusan=addslashes($data->val($i,11));
                $jenjang=addslashes($data->val($i,12));
                $agama=addslashes($data->val($i,13));
                $alamat=addslashes($data->val($i,14));
                $rt=addslashes($data->val($i,15));
                $rw=addslashes($data->val($i,16));
                $desa=addslashes($data->val($i,17));
                $kecamatan=addslashes($data->val($i,18));
                $kode_pos=addslashes($data->val($i,19));
                $transportasi=addslashes($data->val($i,20));
                $no_hp=addslashes($data->val($i,21));
                $tinggal=addslashes($data->val($i,22));
                $nik_ayah=addslashes($data->val($i,23));
                $nama_ayah=addslashes($data->val($i,24));
                $tgl_lahir_ayah=addslashes($data->val($i,25));
                $pendidikan_ayah=addslashes($data->val($i,26));
                $pekerjaan_ayah=addslashes($data->val($i,27));
                $penghasilan_ayah=addslashes($data->val($i,28));
                $nik_ibu=addslashes($data->val($i,29));
                $nama_ibu=addslashes($data->val($i,30));
                $tgl_lahir_ibu=addslashes($data->val($i,31));
                $pendidikan_ibu=addslashes($data->val($i,32));
                $pekerjaan_ibu=addslashes($data->val($i,33));
                $penghasilan_ibu=addslashes($data->val($i,34));
                $nik_wali=addslashes($data->val($i,35));
                $nama_wali=addslashes($data->val($i,36));
                $tgl_lahir_wali=addslashes($data->val($i,37));
                $pendidikan_wali=addslashes($data->val($i,38));
                $pekerjaan_wali=addslashes($data->val($i,39));
                $penghasilan_wali=addslashes($data->val($i,40));
                $no_kip=addslashes($data->val($i,41));
                $password=addslashes($data->val($i,42));
                $aktivasi=addslashes($data->val($i,43));
                $password_cbt=addslashes($data->val($i,44));

                
                    $datax = [
                        'no_daftar'=> $no_daftar,
                        'nik'=> $nik,
                        'nisn'=> $nisn,
                        'nama'=> $nama,
                        'foto'=> $foto,
                        'jenkel'=> $jenkel,
                        'tempat_lahir'=> $tempat_lahir,
                        'tgl_lahir'=> $tgl_lahir,
                        'kelas'=> $kelas,
                        'jurusan'=> $jurusan,
                        'jenjang'=> $jenjang,
                        'agama'=> $agama,
                        'alamat'=> $alamat,
                        'rt'=> $rt,
                        'rw'=> $rw,
                        'desa'=> $desa,
                        'kecamatan'=> $kecamatan,
                        'kode_pos'=> $kode_pos,
                        'transportasi'=> $transportasi,
                        'no_hp'=> $no_hp,
                        'tinggal'=> $tinggal,
                        'nik_ayah'=> $nik_ayah,
                        'nama_ayah'=> $nama_ayah,
                        'tgl_lahir_ayah'=> $tgl_lahir_ayah,
                        'pendidikan_ayah'=> $pendidikan_ayah,
                        'pekerjaan_ayah'=> $pekerjaan_ayah,
                        'penghasilan_ayah'=> $penghasilan_ayah,
                        'nik_ibu'=> $nik_ibu,
                        'nama_ibu'=> $nama_ibu,
                        'tgl_lahir_ibu'=> $tgl_lahir_ibu,
                        'pendidikan_ibu'=> $pendidikan_ibu,
                        'pekerjaan_ibu'=> $pekerjaan_ibu,
                        'penghasilan_ibu'=> $penghasilan_ibu,
                        'nik_wali'=> $nik_wali,
                        'nama_wali'=> $nama_wali,
                        'tgl_lahir_wali'=> $tgl_lahir_wali,
                        'pendidikan_wali'=> $pendidikan_wali,
                        'pekerjaan_wali'=> $pekerjaan_wali,
                        'penghasilan_wali'=> $penghasilan_wali,
                        'no_kip'=> $no_kip,
                        'password'=> $password,
                        'aktivasi'=>$aktivasi,
                        'password_cbt'=>$password_cbt,
                        'status'=> 1
                    ];
                    $exec = insert($koneksi, 'daftar', $datax);
                    ($exec) ? $sukses++ : $gagal++;
                
            }
            $total = $hasildata - 1;
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