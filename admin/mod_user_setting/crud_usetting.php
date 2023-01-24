<?php
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}



if ($pg == 'ubah') {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pw_lama = mysqli_real_escape_string($koneksi, $_POST['password_lama']);
    $password= mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_user where username='$username'"));

    if ($_POST['password_lama'] <> ''){


        if (password_verify($pw_lama, $password['password'])) {
            $data1 = [
                'nama'          => $_POST['nama'],
                'username'      => $_POST['username'],
                'email'         => $_POST['email'],
                'phone'         => $_POST['phone'],
                'password'      => password_hash($_POST['password_baru'], PASSWORD_DEFAULT),
            ];
            $id_user = $_POST['id_user'];
            $exec = update($koneksi, 'tb_user', $data1, ['id_user' => $id_user]);
        } else {
            echo "PW";
        }

    } else {
        $data2 = [
            'nama'          => $_POST['nama'],
            'username'      => $_POST['username'],
            'email'         => $_POST['email'],
            'phone'         => $_POST['phone'],
        ];
        $id_user = $_POST['id_user'];
        $exec = update($koneksi, 'tb_user', $data2, ['id_user' => $id_user]);
    }

    if ($exec) {
        $ektensi = ['jpg', 'png'];
        if ($_FILES['profile']['name'] <> '') {
            $profile = $_FILES['profile']['name'];
            $temp = $_FILES['profile']['tmp_name'];
            $ukuran = $_FILES['profile']['size'];
            $ext = explode('.', $profile);
            $ext = end($ext);

            if($ukuran < 1044070) {
                if (in_array($ext, $ektensi)) {
                    $dest = 'assets/uploaded/profile/' . $profile;
                    $upload = move_uploaded_file($temp, '../../' . $dest);
                    if ($upload) {
                        $data2 = [
                            'photo' => $profile
                        ];
                        $exec = update($koneksi, 'tb_user', $data2, $where);
                        if($exec){
                            
                        }
                    } else {
                        echo "gagal";
                    }
                }
                
            }else{
                echo "ukuran";
            }
            
        }
    } else {
        echo "Gagal menyimpan";
    }
}