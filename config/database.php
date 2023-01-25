<?php
// Deklarasi Paramter Koneksi Database
$server   = "localhost";
$username = "root";
$password = "";
$database = "order_crm";

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

$uri = "http://localhost/bges";

define('BASEPATH', str_replace("config", "", dirname(__FILE__)));
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
