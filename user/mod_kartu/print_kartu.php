<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
include "../../assets/modules/phpqrcode/qrlib.php";

$siswa = fetch($koneksi, 'daftar', ['id_daftar' => dekripsi($_GET['id'])]);

$tempdir = "../../temp/"; //Nama folder tempat menyimpan file qrcode
if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

//isi qrcode jika di scan
$codeContents = $siswa['no_daftar'] . '-' . $siswa['nama'];


$idsiswa = $siswa['no_daftar'];
//simpan file kedalam temp
//nilai konfigurasi Frame di bawah 4 tidak direkomendasikan

QRcode::png($codeContents, $tempdir . $idsiswa . '.png', QR_ECLEVEL_L, 3, 6);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <title>Bukti_<?= $siswa['nama'] ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../../assets/modules/bootstrap/css/bootstrap.min.css">
    <!-- <style type="text/css">
        @page { margin: 0px; }
        body { margin: 0px; }
    </style> -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,700&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="../../assets/css/custom.css">

</head>

<body>
    <img src="../../assets/img/kop.png" width="100%">
    <br><br>
    <center>
        <h5><u>KARTU PESERTA UJIAN</u></h5>
        <p>Penilaian Akhir Semester Ganjil Dan UKK Tahun Pelajaran 2022/2023</p>
    </center>
    <br>
    
    <table class="table table-sm table-striped table-bordered">
        <tbody>
            
            <td width="150px" rowspan="8">
                
                <?php if ($siswa['jenkel'] == "L") { ?>
                <img src="../../assets/img/pas_photo_men.jpg" width="100%">
                <?php } else { ?>
                <img src="../../assets/img/pas_photo_women.jpg" width="100%">
                <?php } ?>

            </td>
            
            <tr>
                <td width="150px">Nama</td>
                <td width="20px" align="center">:</td>
                <td><?= $siswa['nama'] ?></td>
            </tr>
            <tr>
                <td>NISN</td>
                <td width="20px" align="center">:</td>
                <td><?= $siswa['nisn'] ?></td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td width="20px" align="center">:</td>
                <td><?= $siswa['kelas'] ?></td>
            </tr>
            <tr>
                <td>JURUSAN</td>
                <td width="20px" align="center">:</td>
                <td><?= $siswa['jurusan'] ?></td>
            </tr>
            <tr>
                <td>RUANG</td>
                <td width="20px" align="center">:</td>
                <td>Ruang Kelas <?= $siswa['kelas'] ?></td>
            </tr>
            <tr>
                <td><b>USERNAME</b></td>
                <td width="20px" align="center"><b>:</b></td>
                <td><b><?= $siswa['nisn'] ?></b></td>
            </tr>
            <tr>
                <td><b>PASSWORD</b></td>
                <td width="20px" align="center"><b>:</b></td>
                <td><b><?= $siswa['password_cbt'] ?></b></td>
            </tr>
            <tr>
                <td><b>LINK UJIAN</b></td>
                <td width="20px" align="center"><b>:</b></td>
                <td><b>cbt.smktelkom-lpg.sch.id</b></td>
            </tr>
        </tbody>
    </table>
    
    <div>
        <hr>
        <h6>Catatan : </h6>
        <ul>
            <ol>
                <li style="margin-left: -20px">Password mengandung case sensitive, harap memperhatikan penulisan huruf besar, kecil dan symbol pada password!</li>
                <li style="margin-left: -20px">Link ujian akan di informasikan oleh pengawas sebelum ujian dimulai</li>
                <li style="margin-left: -20px">Pastikan memori telepon masih tersisa minimal 20% untuk kenyamanan pengerjaan soal ujian</li>
                <li style="margin-left: -20px">Pastikan anda menggunakan Browser Google Chrome versi terbaru dalam mengerjakan ujian</li>
                <li style="margin-left: -20px">Pastikan tidak ada tab yang terbuka selain ujian</li>
                <li style="margin-left: -20px">Dilarang membuka aplikasi lain saat ujian</li>
            </ol>
        </ul>
        <hr>
        <small>Print Date : <?= date('Y-m-d H:i:s') ?></small>
    </div>
    <div style="text-align: right">
        <img src="<?= $tempdir . $idsiswa . '.png' ?>" />
    </div>

</body>

</html>
<?php

$html = ob_get_clean();
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Kartu_Ujian_$idsiswa.pdf", array("Attachment" => false));

exit(0);
?>