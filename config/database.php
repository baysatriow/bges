<?php
// deklarasi parameter koneksi database
// $server   = "localhost";
// $username = "root";
// $password = "";
// $database = "a_sim";

// Server Online 1
// $server   = "localhost";
// $username = "smklampu_wahyurah55";
// $password = "n9=n+qEfH~ge";
// $database = "smklampu_a_sim";

// Server Online 2
$server   = "localhost";
$username = "root";
$password = "";
$database = "order_crm";

// Server Online 3
// $server   = "103.28.53.92";
// $username = "pekonpan_sim";
// $password = "+ta+tb._P}[x";
// $database = "pekonpan_sim";

// Server Online 4
// $server   = "110.137.135.204:3306";
// $username = "root";
// $password = "";
// $database = "wahyurah_sim";

// koneksi database
$koneksi = mysqli_connect($server, $username, $password, $database);
// cek koneksi
if (!$koneksi) {
    die('Koneksi Database Gagal : ');
}
(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';

// SETTING WAKTU
date_default_timezone_set("Asia/Jakarta");

$uri = "http://localhost/bges_crm_2";
// $uri = "https://sim.smktelkom-lpg.sch.id";

define('BASEPATH', str_replace("config", "", dirname(__FILE__)));
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
