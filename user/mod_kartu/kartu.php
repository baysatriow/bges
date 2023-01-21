<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Kartu Ujian</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href=".">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="?pg=ujian">Data Ujian</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="?pg=kartu">Kartu Ujian</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button> -->
                    <div class="card-title">
                        <i class="fas fa-credit-card"></i> Download Kartu Ujian
                    </div>
                    <!-- Modal Area -->
                    <!-- Modal Import -->
                    <div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="form-import">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Import Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="file">Import File Excel</label>
                                            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
                                            <small id="helpfile" class="form-text text-muted">File harus .xlx</small>
                                        </div>
                                        <a href="template_excel/importsekolah.xls">Download template Excel</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="form-tambah">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Ujian</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Ujian</label>
                                            <input type="text" name="nama" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>TGL MULAI</label>
                                            <input type="date" name="tgl_mulai" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>TGL AKHIR</label>
                                            <input type="date" name="tgl_akhir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Area -->
                </div>
                <div class="card-body">
                    <!-- Tabel Start -->
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Ujian</th>
                                    <th>Tgl. Mulai</th>
                                    <th>Tgl. Akhir</th>
                                    <th>Download Kartu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($koneksi, "select * from ujian WHERE status=1");
                                    $no = 0;
                                    while ($ujian = mysqli_fetch_array($query)) {
                                        $no++;
                                ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $ujian['nama'] ?></td>
                                    <td><?= $ujian['tgl_mulai'] ?></td>
                                    <td><?= $ujian['tgl_akhir'] ?></td>
                                    <td>
                                        <button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($ujian['id_ujian']) ?>"><i class="fa fa-download"></i> DOWNLOAD</button>
                                        <!-- Modal Here -->
                                        <div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($ujian['id_ujian']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <!-- Desc -->
                                                    
                                                    <form id="form-detail">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><i class="fas fa-download"></i> Download Kartu Ujian</b></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama Siswa</label>
                                                                <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>NISN</label>
                                                                <input type="text" name="nis" class="form-control" value="<?= $siswa['nisn'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>STATUS PESERTA</label>
                                                                
                                                                <?php if ($siswa['aktivasi'] == 0) { ?>
                                                                <a href="#" class="badge badge-danger">BELUM AKTIVASI</a>
                                                                <?php } else { ?>
                                                                <a href="#" class="badge badge-success">SUDAH AKTIVASI</a>
                                                                <?php } ?>  
                                                            </div>
                                                            <?php if ($siswa['aktivasi'] == 1) { ?>
                                                            <div class="form-group">
                                                                <a class="btn btn-primary btn-lg btn-block" href="mod_kartu/print_kartu.php?id=<?= enkripsi($siswa['id_daftar']) ?>"><i class="fas fa-download"></i> DOWNLOAD KARTU</a>
                                                            </div>
                                                            <?php } else { ?>
                                                            <div class="form-group">
                                                                <div class="alert alert-warning" role="alert">
                                                                <b>Mohon maaf</b> akses ujian anda belum di aktivasi, harap hubungi bagian Administrasi melalui tombol dibawah ini untuk melakukan permintaan aktivasi!<br>
                                                                <a target="_blank" href="https://api.whatsapp.com/send?phone=6282372605566&text=*Assalamualaikum warahmatullahi wabarakatuh*
%0A%0A
Bu Desi nama saya *<?= $siswa['nama'] ?>* kelas *<?= $siswa['kelas'] ?>* saya ingin konfirmasi bahwa saya belum bisa mendapatkan akses download *kartu ujian penilaian tengah semester ganjil tahun pelajaran 2022/2023*.
%0A%0A
Mohon konfirmasinya bu.
%0A%0A
*Terimakasih.*" class="btn btn-success btn-lg btn-block"><i class="fas fa-paper-plane"></i> Request Access</a>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End -->
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</div>