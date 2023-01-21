<?php
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $data = [
        'nama_sekolah' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'kota' => $_POST['kota'],
        'npsn' => $_POST['npsn'],
        // 'klikchat' => urlencode($_POST['klikchat']),
        // 'livechat' => urlencode($_POST['livechat']),
        // 'nolivechat' => $_POST['nolivechat'],
        // 'jurusan' => $_POST['jurusan'],
        'nama_kepsek' => $_POST['nama_kepsek'],
        'nip_kepsek' => $_POST['nip_kepsek'],
        // 'ppdb_open' => $_POST['ppdb_open'],
        // 'ppdb_close' => $_POST['ppdb_close'],
        // 'pembayaran' => $_POST['pembayaran'],
        // 'jalur' => $_POST['jalur'],
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
        // if ($_FILES['ttd']['name'] <> '') {
        //     $logo = $_FILES['ttd']['name'];
        //     $temp = $_FILES['ttd']['tmp_name'];
        //     $ext = explode('.', $logo);
        //     $ext = end($ext);
        //     if (in_array($ext, $ektensi)) {
        //         $dest = 'dist/img/ttd' . '.' . $ext;
        //         $upload = move_uploaded_file($temp, '../' . $dest);
        //     }
        // }
    } else {
        echo "Gagal menyimpan";
    }
}
if ($pg == 'infobayar') {
    $data = [
        'infobayar' => $_POST['info']
    ];
    $where = [
        'id_setting' => 1
    ];
    $exec = update($koneksi, 'tb_setting', $data, $where);

    if ($exec) {
        echo "ok";
    } else {
        echo "Gagal menyimpan";
    }
}
if ($pg == 'syarat') {
    $data = [
        'syarat' => $_POST['syarat']
    ];
    $where = [
        'id_setting' => 1
    ];
    $exec = update($koneksi, 'tb_setting', $data, $where);

    if ($exec) {
        echo "ok";
    } else {
        echo "Gagal menyimpan";
    }
}
