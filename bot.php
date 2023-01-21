<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
require "config/fungsi_whatsapp.php";
/** 
This is an example of Bot. Please modify according to your needs..
The concept is simple, just trap variable wa_no and wa_text
Do Your Query, then insert the result to Outbox table

For demo please text "INFO" to your WhatsApp Number
 */
$data = json_decode(file_get_contents('php://input'), true);

$number   = $data["from"];
$message  = $data["message"];

@$wa_no = $number;
@$wa_text0 = $message;
@$wa_text = strtoupper($message);
if ($wa_no . $wa_text == '') {
    exit;
}

switch ($wa_text) {

    case 'INFO':
        $msg = "Halo, Selamat datang dilayanan WA {$setting[nama_sekolah]} 
Silahkan kirim pesan sesuai format dibawah ini :
===============================================

*REKAP*
*BIAYA*
_Untuk melihat daftar biaya pendaftaran_
*STATUS#NOPENDAFTARAN*
_contoh STATUS#PPDB2002101_
*CARI#NAMA*
_contoh CARI#NENENG_

";
        send_wa_text($setting['devid_wa'], $wa_no, $msg);
        break;

    case 'REKAPBAYAR':
        $biaya = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from biaya"));

        $msg .= "Sudah Lunas ->  ";


        send_wa_text($setting['devid_wa'], $wa_no, $msg);
        break;
    case 'REKAP':
        $pendaftar = rowcount($koneksi, "daftar");
        $msg .= "Jumlah pendaftar saat ini *{$pendaftar}* orang \n";
        if ($setting['jurusan'] == 1) {
            $jurusan = mysqli_query($koneksi, "select * from jurusan");
            $msg .= "===================\nRekap Per Jurusan \n";
            foreach ($jurusan as $jurusan) {
                $hitung = rowcount($koneksi, "daftar", ['jurusan' => $jurusan['id_jurusan']]);
                $msg .= $jurusan['id_jurusan'] . " => {$hitung} \n";
            }
        }
        $asal = mysqli_query($koneksi, "select * from daftar group by npsn_asal ");
        $msg .= "===================\nRekap Asal Sekolah \n";
        foreach ($asal as $asal) {
            $hitung = rowcount($koneksi, "daftar", ['npsn_asal' => $asal['npsn_asal']]);
            $msg .= $asal['asal_sekolah'] . " => {$hitung} \n";
        }

        send_wa_text($setting['devid_wa'], $wa_no, $msg);
        break;

    case 'BIAYA':
        $msg .= "RINCIAN BIAYA PPDB \n============================================\n";
        $biaya = mysqli_query($koneksi, "select * from biaya");
        foreach ($biaya as $biaya) {
            $msg .= $biaya['nama_biaya'] . " -> " . rupiah($biaya['jumlah']) . "\n--------------------------------------------------\n";
            $total = $total + $biaya['jumlah'];
        }
        $msg .= "*TOTAL BIAYA* ->" . rupiah($total);
        send_wa_text($setting['devid_wa'], $wa_no, $msg);
        break;
}
//---  Using IF
if (substr($wa_text, 0, 6) == 'STATUS') {
    echo $wa_text;
    $pecah = explode('#', $wa_text);
    $id = $pecah[1];
    $daftar = fetch($koneksi, "daftar", ['no_daftar' => $id]);
    $bayar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]'"));
    $sudahbayar = rupiah($bayar['total']);
    $msg = "DATA STATUS PENDAFTAR
========================
No Pendaftaran -> {$daftar[no_daftar]}
Nama -> {$daftar[nama]}
Asal Sekolah -> {$daftar[asal_sekolah]}
TTL -> {$daftar[tempat_lahir]}, {$daftar[tgl_lahir]}

STATUS PEMBAYARAN
========================
Sudah Bayar {$sudahbayar}
";
    send_wa_text($setting['devid_wa'], $wa_no, $msg);
}

if (substr($wa_text, 0, 5) == 'CARI#') {
    echo $wa_text;
    $pecah = explode('#', $wa_text);
    $kata = $pecah[1];
    $daftar = mysqli_query($koneksi, "SELECT * FROM daftar where nama like '%" . $kata . "%'");
    $msg .= "HASIL PENCARIAN
========================\n";
    $hasil = mysqli_num_rows($daftar);
    $msg .= $hasil . " ditemukan.\n";
    if ($hasil <> 0) {
        foreach ($daftar as $daftar) {
            $bayar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]'"));
            $sudahbayar = rupiah($bayar['total']);
            $msg .= "No Pendaftaran -> {$daftar[no_daftar]}
Nama -> {$daftar[nama]}
Asal Sekolah -> {$daftar[asal_sekolah]}
TTL -> {$daftar[tempat_lahir]}, {$daftar[tgl_lahir]}
STATUS PEMBAYARAN
Sudah Bayar {$sudahbayar}
========================
";
        }
    }
    send_wa_text($setting['devid_wa'], $wa_no, $msg);
}
