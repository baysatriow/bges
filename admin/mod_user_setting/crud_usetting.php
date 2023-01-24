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
    $id_user = $_POST['id_user'];
    $file_in = $_FILES['profile']['name'];

    // Check Apakah Password Ingin Di Ganti
    if ($_POST['password_lama'] <> ''){

        // Verifikasi Password Lama 
        if (password_verify($pw_lama, $password['password'])) {
            // $exec = update($koneksi, 'tb_user', $data1, ['id_user' => $id_user]);

            // Upload Photo Profile
            if ($file_in <> '') {
                $ektensi = ['jpg', 'png'];
                if ($_FILES['profile']['name'] <> '') {
                    $profile = $_FILES['profile']['name'];
                    $temp = $_FILES['profile']['tmp_name'];
                    $ukuran = $_FILES['profile']['size'];
                    $ext = explode('.', $profile);
                    $ext = end($ext);
                    
                    // Cek Ukuran Files
                    if($ukuran < 1044070) {
                        if (in_array($ext, $ektensi)) {
                            $dest = 'assets/uploaded/profile/' . $profile;
                            $upload = move_uploaded_file($temp, '../../' . $dest);
                            if ($upload) {
                                $data = [
                                    'nama'          => $_POST['nama'],
                                    'username'      => $_POST['username'],
                                    'email'         => $_POST['email'],
                                    'phone'         => $_POST['phone'],
                                    'password'      => password_hash($_POST['password_baru'], PASSWORD_DEFAULT),
                                    'photo'         => $profile
                                ];
                                $exec = update($koneksi, 'tb_user', $data, ['id_user' => $id_user]);
                            } else {
                                // echo "gagal";
                            }
                        }
                        
                    } else {
                                echo "ukuran";
                      }
                }
            // Jika Pengguna Tidak Upload Files Maka Kode Ini Di Jalankan
            } else {
                    $data = [
                        'nama'          => $_POST['nama'],
                        'username'      => $_POST['username'],
                        'email'         => $_POST['email'],
                        'phone'         => $_POST['phone'],
                        'password'      => password_hash($_POST['password_baru'], PASSWORD_DEFAULT),
                    ];
                    $exec = update($koneksi, 'tb_user', $data, ['id_user' => $id_user]);
              }
          // Peringatan Jika Sandi Lama Salah
        } else {
            echo "PW";
        }

    // Jika Password Lama Tidak Di Isi Maka
    } else {

        // Upload Photo Profile
        if ($file_in <> '') {
            $ektensi = ['jpg', 'png'];
            if ($_FILES['profile']['name'] <> '') {
                $profile = $_FILES['profile']['name'];
                $temp = $_FILES['profile']['tmp_name'];
                $ukuran = $_FILES['profile']['size'];
                $ext = explode('.', $profile);
                $ext = end($ext);
                
                // Cek Ukuran Files
                if($ukuran < 1044070) {
                    if (in_array($ext, $ektensi)) {
                        $dest = 'assets/uploaded/profile/' . $profile;
                        $upload = move_uploaded_file($temp, '../../' . $dest);
                        if ($upload) {
                            $data = [
                                'nama'          => $_POST['nama'],
                                'username'      => $_POST['username'],
                                'email'         => $_POST['email'],
                                'phone'         => $_POST['phone'],
                                'photo'         => $profile
                            ];
                            $exec = update($koneksi, 'tb_user', $data, ['id_user' => $id_user]);
                        } else {
                            // echo "gagal";
                        }
                    }
                    
                } else {
                            echo "ukuran";
                  }
            }
        // Jika Pengguna Tidak Upload Files Maka Kode Ini Di Jalankan
        } else {
                $data = [
                    'nama'          => $_POST['nama'],
                    'username'      => $_POST['username'],
                    'email'         => $_POST['email'],
                    'phone'         => $_POST['phone'],
                ];
                $exec = update($koneksi, 'tb_user', $data, ['id_user' => $id_user]);
          }
    }


}