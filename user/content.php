<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
if ($pg == '') {
    include "home.php";
} elseif ($pg == 'siswa') {
    include "mod_siswa/siswa.php";
} elseif ($pg == 'detail') {
    include "mod_siswa/detail.php";  //Modul Detail Pendaftaran
} elseif ($pg == 'diterima') {
    include "mod_siswa/siswa_diterima.php";  //modul pendaftar diterima
} elseif ($pg == 'ditolak') {
    include "mod_siswa/siswa_ditolak.php";  //modul pendaftar ditolak / cadangan
} elseif ($pg == 'ujian') {
    //cek_login_admin();
    include "mod_ujian/ujian.php";
} elseif ($pg == 'kartu') {
    //cek_login_admin();
    include "mod_kartu/kartu.php";
} elseif ($pg == 'jalur') {
    //cek_login_admin();
    include "mod_jalur/jalur.php";
} elseif ($pg == 'jurusan') {
    //cek_login_admin();
    include "mod_jurusan/jurusan.php";
} elseif ($pg == 'jenis') {
    //cek_login_admin();
    include "mod_jenis/jenis.php";
} elseif ($pg == 'biaya') {
    //cek_login_admin();
    include "mod_biaya/biaya.php";
} elseif ($pg == 'bayar') {
    if ($setting['pembayaran'] <> 1) {
        echo "<script>location.href='.';</script>";
    }
    include "mod_bayar/bayar.php";
} elseif ($pg == 'pengumuman') {
    include "mod_pengumuman/pengumuman.php";
} elseif ($pg == 'user') {
    //cek_login_admin();
    include "mod_user/user.php";
} elseif ($pg == 'setting') {
    //cek_login_admin();
    include "mod_setting/setting.php";
} elseif ($pg == 'kontak') {
    //cek_login_admin();
    include "mod_kontak/kontak.php";
} elseif ($pg == 'infobayar') {
    //cek_login_admin();
    include "mod_web/pembayaran.php";
} elseif ($pg == 'syarat') {
    //cek_login_admin();
    include "mod_web/syarat.php";
} elseif ($pg == 'slide') {
    //cek_login_admin();
    include "mod_slide/slide.php";
} elseif ($pg == 'sekolahpilihan') {
    //cek_login_admin();
    include "mod_sekolahpilihan/sekolahpilihan.php";
} elseif ($pg == 'kirimpesan') {
    //cek_login_admin();
    include "mod_whatsapp/kirim_pesan.php";
} elseif ($pg == 'device') {
    //cek_login_admin();
    include "mod_whatsapp/device.php";
}
