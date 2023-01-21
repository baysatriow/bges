<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
$id = $_SESSION['id_user'];
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}

// Edit Data By id
if ($pg == 'edit') {

    $id=$_POST['id_am'];

    $data = [
        'nama_am'          => $_POST['nama_am'],
        'nik'              => $_POST['nik'],
        'segmen'           => $_POST['segmen'],
    ];
    $exec = update($koneksi, 'tb_am', $data, ['id_am' => $id]);
    echo $exec;
}

// Mentahan Edit data
if ($pg == 'ubah') {
    $data = [
        'no_order'  => $_POST['no_order'],
    ];
    $id = [
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

// Add Data
if  ($pg == 'tambah'){

    $ektensi = ['pdf'];
    if ($_POST['no_order'] <> '') {

        // $ukuran = $_FILES['kb']['size'];

        $file1=$_FILES['kb']['name'];
        $file_tmp1=$_FILES['kb']['tmp_name'];
        $ukuran1 = $_FILES['kb']['size'];

        $file2=$_FILES['ba_ren']['name'];
        $file_tmp2=$_FILES['ba_ren']['tmp_name'];
        $ukuran2 = $_FILES['ba_ren']['size'];

        $file3=$_FILES['ba_do']['name'];
        $file_tmp3=$_FILES['ba_do']['tmp_name'];
        $ukuran3 = $_FILES['ba_do']['size'];
        
        $file4=$_FILES['baso']['name'];
        $file_tmp4=$_FILES['baso']['tmp_name'];
        $ukuran4 = $_FILES['baso']['size'];

        $file5=$_FILES['ba_pen']['name'];
        $file_tmp5=$_FILES['ba_pen']['tmp_name'];
        $ukuran5 = $_FILES['ba_pen']['size'];

        $file6=$_FILES['po']['name'];
        $file_tmp6=$_FILES['po']['tmp_name'];
        $ukuran6 = $_FILES['po']['size'];

        $file7=$_FILES['kl']['name'];
        $file_tmp7=$_FILES['kl']['tmp_name'];
        $ukuran7 = $_FILES['kl']['size'];

        $file8=$_FILES['sph']['name'];
        $file_tmp8=$_FILES['sph']['tmp_name'];
        $ukuran8 = $_FILES['sph']['size'];

        $file9=$_FILES['skm']['name'];
        $file_tmp9=$_FILES['skm']['tmp_name'];
        $ukuran9 = $_FILES['skm']['size'];

        $file10=$_FILES['baa']['name'];
        $file_tmp10=$_FILES['baa']['tmp_name'];
        $ukuran10 = $_FILES['baa']['size'];

        $file11=$_FILES['bai']['name'];
        $file_tmp11=$_FILES['bai']['tmp_name'];
        $ukuran11 = $_FILES['bai']['size'];

        $file12=$_FILES['baut']['name'];
        $file_tmp12=$_FILES['baut']['tmp_name'];
        $ukuran12 = $_FILES['baut']['size'];

        $file13=$_FILES['bast']['name'];
        $file_tmp13=$_FILES['bast']['tmp_name'];
        $ukuran13 = $_FILES['bast']['size'];

        $file14=$_FILES['bard']['name'];
        $file_tmp14=$_FILES['bard']['tmp_name'];
        $ukuran14 = $_FILES['bard']['size'];

        $ext = explode('.', $file1);
        $ext = end($ext);

        if ($ukuran1 & $ukuran2 & $ukuran3 & $ukuran4 & $ukuran5 & $ukuran6 & $ukuran7 & $ukuran8 & $ukuran9 & $ukuran10 & $ukuran11 & $ukuran12 & $ukuran13 & $ukuran14< 1044070) {
            if (in_array($ext, $ektensi)) {

                $location1='assets/uploaded/files/kb/' . $file1;
                $location2='assets/uploaded/files/ba_ren/' . $file2;
                $location3='assets/uploaded/files/ba_do/' . $file3;
                $location4='assets/uploaded/files/baso/' . $file4;
                $location5='assets/uploaded/files/ba_pen/' . $file5;
                $location6='assets/uploaded/files/po/' . $file6;
                $location7='assets/uploaded/files/kl/' . $file7;
                $location8='assets/uploaded/files/sph/' . $file8;
                $location9='assets/uploaded/files/skm/' . $file9;
                $location10='assets/uploaded/files/baa/' . $file10;
                $location11='assets/uploaded/files/bai/' . $file11;
                $location12='assets/uploaded/files/baut/' . $file12;
                $location13='assets/uploaded/files/bast/' . $file13;
                $location14='assets/uploaded/files/bard/' . $file14;

                // $dest = 'assets/uploaded/files/' . $file1;
                $data2 = [
                    'no_order'      => $_POST['no_order'],
                    'kb'            => $file1,
                    'ba_ren'        => $file2,
                    'ba_do'         => $file3,
                    'baso'          => $file4,
                    'ba_pen'        => $file5,
                    'po'            => $file6,
                    'kl'            => $file7,
                    'sph'           => $file8,
                    'skm'           => $file9,
                    'baa'           => $file10,
                    'bai'           => $file11,
                    'baut'          => $file12,
                    'bast'          => $file13,
                    'bard'          => $file14,
                ];
                $exec = insert($koneksi, 'tb_kontrak', $data2);

                
                // $upload = move_uploaded_file($temp, '../../' . $dest);
                // if ($upload) {
                //     // $data2 = [
                //     //     'no_order'      => $_POST['no_order'],
                //     //     'kb' => $dest
                //     // ];
                //     // $exec = insert($koneksi, 'tb_kontrak', $data2);
                // }

                if ($exec){
                    move_uploaded_file($file_tmp1, '../../' . $location1);
                    move_uploaded_file($file_tmp2, '../../' . $location2);
                    move_uploaded_file($file_tmp3, '../../' . $location3);
                    move_uploaded_file($file_tmp4, '../../' . $location4);
                    move_uploaded_file($file_tmp5, '../../' . $location5);
                    move_uploaded_file($file_tmp6, '../../' . $location6);
                    move_uploaded_file($file_tmp7, '../../' . $location7);
                    move_uploaded_file($file_tmp8, '../../' . $location8);
                    move_uploaded_file($file_tmp9, '../../' . $location9);
                    move_uploaded_file($file_tmp10, '../../' . $location10);
                    move_uploaded_file($file_tmp11, '../../' . $location11);
                    move_uploaded_file($file_tmp12, '../../' . $location12);
                    move_uploaded_file($file_tmp13, '../../' . $location13);
                    move_uploaded_file($file_tmp14, '../../' . $location14);
                    
                    echo "OK";
                }
            }
        }else{
            echo "Ukuran";
        }
    }

}

// Delete Record By id
if ($pg == 'hapus') {

    $id=$_POST['id'];
    // $hapus = mysql_query("delete from tb_am where id=".$id." ");
    $query = mysqli_query($koneksi, "DELETE from tb_kontrak where id_kontrak=".$id." ");
    if($query) {
        echo "OK";
    } else {
        // 
    }
}

// Delete Record By Check Box
if ($pg == 'hapusdaftar') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from tb_kontrak where id_kontrak in (" . $kode . ")");
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}