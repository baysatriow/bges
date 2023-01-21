-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 10:39 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_candy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(20) NOT NULL,
  `id_biaya` varchar(255) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_daftar` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` int(10) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `verifikasi` int(1) NOT NULL DEFAULT 0,
  `hapus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` varchar(50) NOT NULL,
  `nama_biaya` varchar(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `nama_biaya`, `jumlah`, `status`) VALUES
('BUKU', 'BUKU', 300000, '0'),
('SERAGAM', 'SERAGAM', 500000, '0'),
('SPB', 'SUMBANGAN PEMBANGUNAN', 1000000, '1'),
('SPP', 'SPP', 200000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  `jenis` varchar(11) DEFAULT NULL,
  `jalur` varchar(100) NOT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `no_kk` varchar(30) DEFAULT NULL,
  `nisn` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `jenkel` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `npsn_sekolah_pilihan` varchar(15) NOT NULL,
  `sekolah_pilihan` varchar(200) NOT NULL,
  `asal_sekolah` varchar(128) DEFAULT NULL,
  `npsn_asal` varchar(20) DEFAULT NULL,
  `kelas` varchar(11) DEFAULT NULL,
  `jurusan` varchar(11) DEFAULT '',
  `jenjang` varchar(11) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `desa` varchar(128) DEFAULT NULL,
  `kecamatan` varchar(128) DEFAULT NULL,
  `kota` varchar(128) DEFAULT NULL,
  `provinsi` varchar(128) DEFAULT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `transportasi` varchar(128) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `tinggi` int(3) DEFAULT NULL,
  `berat` int(3) DEFAULT NULL,
  `status_keluarga` varchar(50) DEFAULT NULL,
  `tinggal` varchar(128) DEFAULT NULL,
  `jarak` varchar(128) DEFAULT NULL,
  `waktu` varchar(128) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nama_ayah` varchar(128) DEFAULT NULL,
  `tempat_ayah` varchar(128) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `status_ayah` varchar(128) DEFAULT NULL,
  `pendidikan_ayah` varchar(128) DEFAULT NULL,
  `pekerjaan_ayah` varchar(128) DEFAULT NULL,
  `penghasilan_ayah` varchar(128) DEFAULT NULL,
  `no_hp_ayah` varchar(16) DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `nama_ibu` varchar(128) DEFAULT NULL,
  `tempat_ibu` varchar(128) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `status_ibu` varchar(128) DEFAULT NULL,
  `pendidikan_ibu` varchar(128) DEFAULT NULL,
  `pekerjaan_ibu` varchar(128) DEFAULT NULL,
  `penghasilan_ibu` varchar(128) DEFAULT NULL,
  `no_hp_ibu` varchar(16) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `nama_wali` varchar(128) DEFAULT NULL,
  `tempat_wali` varchar(128) DEFAULT NULL,
  `tgl_lahir_wali` date DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `no_ijazah` varchar(128) DEFAULT NULL,
  `no_shun` varchar(128) DEFAULT NULL,
  `no_ujian` varchar(128) DEFAULT NULL,
  `no_kip` varchar(30) DEFAULT NULL,
  `file_kip` varchar(256) DEFAULT NULL,
  `file_ktp` varchar(256) DEFAULT NULL,
  `file_kk` varchar(256) DEFAULT NULL,
  `file_ijazah` varchar(256) DEFAULT NULL,
  `file_akte` varchar(256) DEFAULT NULL,
  `file_shun` varchar(256) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `alasan_keluar` varchar(100) DEFAULT NULL,
  `surat_keluar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `petugas_daftar` varchar(10) DEFAULT NULL,
  `petugas_konfirmasi` varchar(10) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `tgl_konfirmasi` date DEFAULT NULL,
  `baju` varchar(10) DEFAULT NULL,
  `bayar` varchar(100) DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL,
  `anak_guru` int(1) NOT NULL,
  `anak_yayasan` int(1) NOT NULL,
  `diskon` int(1) NOT NULL,
  `sekolah_katolik` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `no_daftar`, `jenis`, `jalur`, `nis`, `nik`, `no_kk`, `nisn`, `nama`, `foto`, `jenkel`, `tempat_lahir`, `tgl_lahir`, `npsn_sekolah_pilihan`, `sekolah_pilihan`, `asal_sekolah`, `npsn_asal`, `kelas`, `jurusan`, `jenjang`, `agama`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `transportasi`, `no_hp`, `email`, `anak_ke`, `saudara`, `tinggi`, `berat`, `status_keluarga`, `tinggal`, `jarak`, `waktu`, `nik_ayah`, `nama_ayah`, `tempat_ayah`, `tgl_lahir_ayah`, `status_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `nik_ibu`, `nama_ibu`, `tempat_ibu`, `tgl_lahir_ibu`, `status_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`, `nik_wali`, `nama_wali`, `tempat_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_hp_wali`, `no_ijazah`, `no_shun`, `no_ujian`, `no_kip`, `file_kip`, `file_ktp`, `file_kk`, `file_ijazah`, `file_akte`, `file_shun`, `tgl_keluar`, `alasan_keluar`, `surat_keluar`, `level`, `aktif`, `status`, `petugas_daftar`, `petugas_konfirmasi`, `tgl_daftar`, `tgl_konfirmasi`, `baju`, `bayar`, `online`, `password`, `anak_guru`, `anak_yayasan`, `diskon`, `sekolah_katolik`) VALUES
(3, 'PPDB2021001', 'SB', '', NULL, '3216094503030011', NULL, '', 'Pajar Sidik', 'default.png', NULL, NULL, NULL, '69787351', 'SMK HS AGUNG', 'SMP NEGERI 2 KARANG BAHAGIA', '20237902', NULL, 'ALL', 'SD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085692512381', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '123456', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id_device` int(11) NOT NULL,
  `nama_device` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `device_id` varchar(250) NOT NULL,
  `status` int(1) NOT NULL,
  `no_utama` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id_device`, `nama_device`, `no_hp`, `device_id`, `status`, `no_utama`) VALUES
(2, 'Device 1', '08986204405', 'b955fcbb16e81', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `id_permohonan` varchar(30) NOT NULL,
  `nik` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jalur`
--

CREATE TABLE `jalur` (
  `id_jalur` varchar(100) NOT NULL,
  `nama_jalur` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `kuota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalur`
--

INSERT INTO `jalur` (`id_jalur`, `nama_jalur`, `status`, `kuota`) VALUES
('AFIRMASI', 'AFIRMASI', 1, 50),
('PRESTASI', 'PRESTASI', 1, 50),
('ZONASI', 'ZONASI', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `status`) VALUES
('SB', 'Siswa Baru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` varchar(20) NOT NULL,
  `nama_jenjang` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `kuota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `status`, `kuota`) VALUES
('SD', 'SEKOLAH DASAR', 1, 900);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `kuota` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kuota`, `status`) VALUES
('TKJ', 'SD', 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `no_kontak`, `status`) VALUES
(1, 'Roy Kurniawan', '081210654', 1),
(2, 'Tugiman', '0812826564', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengumuman` text DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_user`, `judul`, `pengumuman`, `tgl`, `jenis`) VALUES
(2, 5, 'INFORMASI DAFTAR ULANG', '<p>Kepada Calon Siswa Siswi SMK HS AGUNG yang sudah mendaftar silahkan untuk melakukan <b>DAFTAR ULANG</b> Ke Sekolah dengan membawa persyaratan Formulir Pendaftaran dan membayar <b>Biaya Pendaftaran</b>.Â </p>', '2020-04-09 15:10:52', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `npsn` varchar(16) NOT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `sekolah_katolik` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`npsn`, `nama_sekolah`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `status`, `sekolah_katolik`) VALUES
('20237902', 'SMP NEGERI 2 KARANG BAHAGIA', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20237935', 'SMPS CENDIKIA DEWANTARA', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20243991', 'SMP MITRA KARYA', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20252899', 'SMP NEGERI 1 KARANG BAHAGIA', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20270060', 'SMP TERPADU NAHDHOTUL IKHWAN', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20279304', 'MTsN 2 Bekasi', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20279305', 'MTSS AL-WATHONIYAH 55', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20279306', 'MTSS AS-SIRAAJ', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20279307', 'MTSS MIFTAHUL ISLAM', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20279308', 'MTSS TARBIYATUSSHIBYAN', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20279309', 'MTSS AL-MA UN', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20279310', 'MTSS TARBIYATUL ASAAS', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('20279311', 'MTSS AR-RAYYAAN', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('69787293', 'MTsS SIRAAJUL UMMAH', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('69965671', 'SMPIT DAROJATUL ASHFAD', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('69970221', 'SMP IT ARASYID', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('69979591', 'SMPIT AL - MUFID', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('69990690', 'SMP NEGERI 3 KARANG BAHAGIA', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('70003033', 'SMP DHARMA PARAMITHA', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('70005155', 'SMPIT DARUL HUFFADZ BOARDING SCHOOL', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('70006196', 'MTSS TAHFIZ QUR', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('70007065', 'SMP ROUDHOTUL ILMI', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0),
('70009085', 'MTSS AT TAJDID ALMUJAHIDIN 2', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sekolahpilihan`
--

CREATE TABLE `sekolahpilihan` (
  `npsn` varchar(16) NOT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolahpilihan`
--

INSERT INTO `sekolahpilihan` (`npsn`, `nama_sekolah`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `status`) VALUES
('69787351', 'SMK HS AGUNG', NULL, 'Prov. Jawa Barat', 'Kab. Bekasi', 'Kec. Karang Bahagia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(1) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `npsn` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `klikchat` text DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `nolivechat` varchar(50) DEFAULT NULL,
  `infobayar` text DEFAULT NULL,
  `syarat` text DEFAULT NULL,
  `spp` int(5) NOT NULL,
  `spb` int(5) NOT NULL,
  `jurusan` int(1) NOT NULL,
  `jalur` int(1) NOT NULL,
  `nama_kepsek` varchar(200) NOT NULL,
  `nip_kepsek` varchar(200) NOT NULL,
  `ppdb_open` datetime DEFAULT NULL,
  `ppdb_close` datetime DEFAULT NULL,
  `pembayaran` int(1) NOT NULL,
  `devid_wa` varchar(200) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nama_rek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_sekolah`, `npsn`, `alamat`, `kota`, `provinsi`, `logo`, `favicon`, `email`, `no_telp`, `klikchat`, `livechat`, `nolivechat`, `infobayar`, `syarat`, `spp`, `spb`, `jurusan`, `jalur`, `nama_kepsek`, `nip_kepsek`, `ppdb_open`, `ppdb_close`, `pembayaran`, `devid_wa`, `no_rek`, `nama_bank`, `nama_rek`) VALUES
(1, 'SMK HS AGUNG', '69787351', 'Kp. Pulo Bambu Desa Karang Bahagia Kec Karang Bahagia', 'Bekasi', 'Jawa Barat', 'assets/img/logo/logo2.png', NULL, NULL, NULL, 'Hai+hai', 'Assalamualaikum+ukhty', '089862044056', '<p>Silahkan melakukan proses pembayaran melalui No Rekening dibawah ini :</p><p>0000000000000</p><p>A/N SMK HS AGUNG</p><p>BANK NASIONAL INDONESIA</p><p>Setelah melakukan proses pembayaran harap konfirmasikan pembayaran di menu tambah pembayaran.</p><p>setelah itu akan dilakukan pengechekan oleh Panitia PPDB SMK HS AGUNG.</p>', '<p>SYARAT PENDAFTARAN</p>', 1234, 5678, 0, 0, 'Asep Sudrajat', '1234', '2021-03-23 23:59:00', '2021-04-25 11:00:00', 1, 'b955fcbb16e81', '1234567', 'BANK NASIONAL INDONESIA (BNI)', 'SMK HS AGUNG');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(5) NOT NULL,
  `nama_slide` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `nama_slide`) VALUES
(5, 'assets/img/slide/slide-20210406230341.jpg'),
(6, 'assets/img/slide/slide-20210406230423.jpg'),
(7, 'assets/img/slide/slide-20210406230842.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `level` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `level`, `username`, `password`, `status`) VALUES
(4, 'SMK HS AGUNG', 'admin', 'smk', '$2y$10$xKPLPqNPcOSzxuRo2aOHuemIKMi58b/xTLBVkC6jT5BezVOYLk3qS', 1),
(5, 'Administrator', 'admin', 'admin', '$2y$10$j5STRMVkhno25h93TJGDUupdr4L7CDEQQZCOwyFyqFO5QfCteP3H.', 1),
(6, 'Ujang Admin', 'kepala', 'ujang', '$2y$10$O6R3PXNT7Ue.HVz8K9qV4OHU2JmulT8vf0zdJaDPLuU1CuO2H3d6W', 1),
(17, 'Vitria AF Alatas', 'bendahara', 'vitria', '$2y$10$qqPGjqyFRtV/H5ta74poeuFzLN7H4KBadSwu1QbJ1Cy29ZchNv9Pi', 1),
(18, 'PAJAR SIDIK', 'operator', 'pajar', '$2y$10$84q0LLO1vJBzBEUr09UBE.ktl1Hw4Z.a./sBAPbgNShsRUJQ/iXDy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD UNIQUE KEY `no_daftar` (`no_daftar`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id_device`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jalur`
--
ALTER TABLE `jalur`
  ADD PRIMARY KEY (`id_jalur`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `sekolahpilihan`
--
ALTER TABLE `sekolahpilihan`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
