<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
require "config/fungsi_whatsapp.php";
session_start();

if ($pg == 'login') {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = mysqli_query($koneksi, "select * from tb_user where username='$username'");
    $ceklogin = mysqli_num_rows($query);
    $user = mysqli_fetch_array($query);
    if ($ceklogin == 1) {
        if (!password_verify($password, $user['password'])) {
            echo "salah";
        } else {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['level'] = $user['level'];
            echo "ok";
        }
    } else {
        echo "oo";
    }
    
}
