<?php 
include "../config/database.php";

//variabel no_order yang dikirimkan form.php
$nomor_order = $_GET['nomor_order'];

//mengambil data
$query = mysqli_query($koneksi, "select * from tb_pelanggan where nomor_order='$nomor_order'");
$userid = mysqli_fetch_array($query);
$data = array(
            'nomor_order'      =>  @$userid['nomor_order'],        
            'nama_pel'     =>  @$userid['nama_pel'],
            'ca'      =>  @$userid['ca'],
            'ca_site'  =>  @$userid['ca_site'],);
           
//tampil data
echo json_encode($data);
?>