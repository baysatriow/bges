<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "order_crm");

//variabel nim yang dikirimkan form.php
$nomor_order= $_GET['nomor_order'];

//mengambil data
$query = mysqli_query($koneksi, "select * from tb_pelanggan where nomor_order='$nomor_order'");
$order = mysqli_fetch_array($query);
$data = array(
            'nomor_order'      =>  @$order['nomor_order'],        
            'nama_pel'     =>  @$order['nama_pel'],
            'nomor_aggre'     =>  @$order['nomor_aggre'],
        );
           
//tampil data
echo json_encode($data);
?>