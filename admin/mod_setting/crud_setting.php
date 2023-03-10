<?php
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}

// Update Data Query
if ($pg == 'ubah') {
    $data = [
        'nama_sekolah' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'kota' => $_POST['kota'],
        'npsn' => $_POST['npsn'],
        'nama_kepsek' => $_POST['nama_kepsek'],
        'nip_kepsek' => $_POST['nip_kepsek'],
        'no_rek' => $_POST['no_rek'],
        'nama_rek' => $_POST['nama_rek'],
        'nama_bank' => $_POST['nama_bank'],
    ];
    $where = [
        'id_setting' => 1
    ];
    $exec = update($koneksi, 'tb_setting', $data, $where);
    echo mysqli_error($koneksi);
    if ($exec) {
        $ektensi = ['jpg', 'png'];
        if ($_FILES['logo']['name'] <> '') {
            $logo = $_FILES['logo']['name'];
            $temp = $_FILES['logo']['tmp_name'];
            $ext = explode('.', $logo);
            $ext = end($ext);
            if (in_array($ext, $ektensi)) {
                $dest = 'assets/img/logo/logo' . rand(1, 1000) . '.' . $ext;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data2 = [
                        'logo' => $dest
                    ];
                    $exec = update($koneksi, 'tb_setting', $data2, $where);
                } else {
                    echo "gagal";
                }
            }
        }
    } else {
        echo "Gagal menyimpan";
    }
}
