<?php 
require 'database.php';
$order = mysqli_fetch_array($koneksi, "SELECT * FROM tb_order");
$today  = date_create('today'); // waktu sekarang
$tanggal = date_create($order['date_end']);

// tahun
$y = $today->diff($tanggal)->y;

// bulan
$m = $today->diff($tanggal)->m;

// hari
$d = $today->diff($tanggal)->d;

$hasil = $y . " year " . $m . " month " . $d . " day";
$hasil2 = $m . " month " . $d . " day";
$hasil3 = $d . " day";

if ($today > $tanggal){
	echo "<div class='badge badge-danger'>End</div>";
}else if($d < 1 ){
	echo "<div class='badge badge-danger'>End</div>";
}else if ($m < 1){
	echo $hasil3; 
}else if ($y < 1) {
	echo $hasil2;
}else if($y >= 1) {
	echo $hasil;
}

?>