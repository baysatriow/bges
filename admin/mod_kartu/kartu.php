<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-chart-pie text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">TOTAL SISIWA</p>
                                <h4 class="card-title"><?= rowcount($koneksi, 'daftar') ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">AKTIVASI</p>
                                <h4 class="card-title"><?= rowcount($koneksi, 'daftar', ['aktivasi' => 1]) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-error text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">BELUM AKTIVASI</p>
                                <h4 class="card-title"><?= rowcount($koneksi, 'daftar', ['aktivasi' => 0]) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-pencil text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">DATA UJIAN</p>
                                <h4 class="card-title"><?= rowcount($koneksi, 'ujian') ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header">
        <h4 class="page-title">Data Kartu</h4>
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
                <a href="#">Data Ujian</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="?pg=kartu">Data Kartu</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Belum Aktivasi</h4>
                </div>
                <div class="card-body">
                    <!-- Tabel Start -->
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>NIK</th>
                                    <th>Kelas</th>
                                    <th>Aktivasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($koneksi, "select * from daftar WHERE aktivasi=0");
                                    $no = 0;
                                    while ($siswa = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $siswa['nama'] ?></td>
                                    <td><?= $siswa['nis'] ?></td>
                                    <td><?= $siswa['nisn'] ?></td>
                                    <td><?= $siswa['nik'] ?></td>
                                    <td><?= $siswa['kelas'] ?></td>
                                    <td>
                                        <?php if ($siswa['aktivasi'] == 1) { ?>
                                        <a href="#" class="aktifkan badge badge-success">SUDAH AKTIVASI</a>
                                        <?php } else { ?>
                                        <a href="#" class="aktifkan badge badge-danger">BELUM AKTIVASI</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="#" data-id="<?= $siswa['id_daftar'] ?>" class="aktivasi btn btn-dark btn-xs"><i class="fas fa-check"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>

            <!-- Sudah -->
            <div class="card">
                <div class="card-header">
                    <h4>Data Sudah Aktivasi</h4>
                </div>
                <div class="card-body">
                    <!-- Tabel Start -->
                    <div class="table-responsive">
                        <table id="basic-datatables2" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Kelas</th>
                                    <th>Tgl. Aktivasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($koneksi, "select * from daftar WHERE aktivasi=1");
                                    $no = 0;
                                    while ($siswa = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $siswa['nama'] ?></td>
                                    <td><?= $siswa['nis'] ?></td>
                                    <td><?= $siswa['nisn'] ?></td>
                                    <td><?= $siswa['kelas'] ?></td>
                                    <td><?= $siswa['tgl_aktivasi'] ?></td>
                                    <td>
                                        <a href="#" data-id="<?= $siswa['id_daftar'] ?>" class="nonaktivasi btn btn-danger btn-xs"><i class="fas fa-times"></i></a>
                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($siswa['id_daftar']) ?>"><i class="fas fa-info-circle"></i></button>
                                        <!-- Print -->
                                        <a href="mod_kartu/print_kartu.php?id=<?= enkripsi($siswa['id_daftar']) ?>" class="btn btn-success btn-xs"><i class="fas fa-print"></i></a>
                                        <!-- Modal Here -->
                                        <div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($siswa['id_daftar']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <!-- Desc -->
                                                    
                                                    <form id="form-detail">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Siswa <b><?= $siswa['nama'] ?></b></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>NIS</label>
                                                                <input type="number" name="nis" class="form-control" value="<?= $siswa['nis'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>NISN</label>
                                                                <input type="number" name="nis" class="form-control" value="<?= $siswa['nisn'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>NIK</label>
                                                                <input type="number" name="nik" class="form-control" value="<?= $siswa['nik'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>KELAS</label>
                                                                <input type="text" name="nik" class="form-control" value="<?= $siswa['kelas'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>JURUSAN</label>
                                                                <input type="text" name="nik" class="form-control" value="<?= $siswa['jurusan'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>TEMPAT LAHIR</label>
                                                                <input type="text" name="nik" class="form-control" value="<?= $siswa['tempat_lahir'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>TGL. LAHIR</label>
                                                                <input type="text" name="nik" class="form-control" value="<?= $siswa['tgl_lahir'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>AGAMA</label>
                                                                <input type="text" name="nik" class="form-control" value="<?= $siswa['agama'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>ALAMAT</label>
                                                                <input type="text" name="nik" class="form-control" value="<?= $siswa['alamat'] ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>AKTIVASI UJIAN</label>
                                                                <?php if ($siswa['aktivasi'] == 1) { ?>
                                                                <a href="#" class="aktifkan badge badge-success">SUDAH AKTIVASI</a>
                                                                <?php } else { ?>
                                                                <a href="#" class="aktifkan badge badge-danger">BELUM AKTIVASI</a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<!-- Page Script -->
<script>
    $('#basic-datatables').on('click', '.aktivasi', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Aktivasi Siswa Ini !',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_kartu/crud_kartu.php?pg=aktivasi',
                    method: "POST",
                    data: 'id_daftar=' + id,
                    success: function(data) {
                        iziToast.info({
                            title: 'Sukses',
                            message: 'Siswa berhasil di aktivasi !',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });

    $('#basic-datatables2').on('click', '.nonaktivasi', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Membatalkan Aktivasi Siswa Ini !',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_kartu/crud_kartu.php?pg=nonaktivasi',
                    method: "POST",
                    data: 'id_daftar=' + id,
                    success: function(data) {
                        iziToast.info({
                            title: 'Sukses',
                            message: 'Aktivasi berhasil di Dibatalkan !',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });

    //IMPORT FILE PENDUKUNG 
    $('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_siswa/crud_siswa.php?pg=import',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                $('#importdata').modal('hide');
                iziToast.success({
                    title: 'Mantap!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<!-- End -->