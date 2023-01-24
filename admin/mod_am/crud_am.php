<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}

// Tambah Data
if ($pg == 'tambah') {
    $data = [
        'nama_am'          => $_POST['nama_am'],
        'nik'           => $_POST['nik'],
        'segmen'           => $_POST['segmen'],
 
    ];
    $exec = insert($koneksi, 'tb_am', $data);
    echo $exec;
}

// Edit Data
if ($pg == 'edit') {

    $where = [
        'id_am' => $_POST['id_am'],
    ];
    $data = [
        'nama_am'          => $_POST['nama_am'],
        'nik'              => $_POST['nik'],
        'segmen'           => $_POST['segmen']
    ];
    $exec = update($koneksi, 'tb_am', $data, $where);
    echo $exec;
    // echo $data;
}

// Hapus Data Berdasarkan ID
if ($pg == 'hapus') {

    $id=$_POST['id_am'];
    // $hapus = mysql_query("delete from tb_am where id=".$id." ");
    $query = mysqli_query($koneksi, "DELETE from tb_am where id_am=".$id." ");
    if($query) {
        echo "OK";
    } else {
        // 
    }
}

// Hapus Data Menggunakan Checklist
if ($pg == 'hapusdaftar') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from tb_am where id_am in (" . $kode . ")");
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}