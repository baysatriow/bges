<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/function_sekolah.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_sekolah' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'status' => $status
    ];
    $npsn = $_POST['npsn'];
    $exec = update($koneksi, 'sekolah', $data, ['npsn' => $npsn]);
    echo $exec;
}
if ($pg == 'tambah') {
    $data = [
        'nama'          => $_POST['nama'],
        'tgl_mulai'           => $_POST['tgl_mulai'],
        'tgl_akhir'           => $_POST['tgl_akhir'],
        'status'        => 0
    ];
    $exec = insert($koneksi, 'ujian', $data);
    echo $exec;
}
if ($pg == 'grab_sekolah') {
    $sekolah = $_POST['sekolah'];
    $kecamatan = explode(':', $_POST['kecamatan']);
    $kabupaten = explode(':', $_POST['kabupaten']);
    $provinsi = explode(':', $_POST['provinsi']);
    foreach ($sekolah as $sekolah) {
        $data = explode(":", $sekolah);
        $npsn = $data[0];
        $nama = $data[1];
        $data = [
            'npsn'          => $npsn,
            'nama_sekolah'   => $nama,
            'status'         => 1,
            'kecamatan'     => $kecamatan[1],
            'kabupaten'     => $kabupaten[1],
            'provinsi'     => $provinsi[1]
        ];

        $cek = rowcount($koneksi, 'sekolah', ['npsn' => $npsn]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'sekolah', $data);
        }
    }
}
if ($pg == 'hapus') {
    $npsn = $_POST['npsn'];
    delete($koneksi, 'sekolah', ['npsn' => $npsn]);
}

if ($pg == 'statusdownload') {
    $data = [
        'sdh_download' => 1
    ];
    $id_daftar = $_POST['id_daftar'];
    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id_daftar]);
    echo $exec;
}

if ($pg == 'nonaktifkan') {
    $data = [
        'status' => 0
    ];
    $id_ujian = $_POST['id_ujian'];
    $exec = update($koneksi, 'ujian', $data, ['id_ujian' => $id_ujian]);
    echo $exec;
}


if ($pg == 'import') {
    if (isset($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = explode('.', $file);
        $ext = end($ext);
        if ($ext <> 'xls') {
            echo "harap pilih file excel .xls";
        } else {
            $data = new Spreadsheet_Excel_Reader($temp);
            $hasildata = $data->rowcount($sheet_index = 0);
            $sukses = $gagal = 0;

            mysqli_query($koneksi, "truncate sekolah");
            for ($i = 2; $i <= $hasildata; $i++) {
                $no_daftar=$data->val($i, 2);
                $nik=addslashes($data->val($i,3));
                $nisn=addslashes($data->val($i,4));
                $nama=addslashes($data->val($i,5));
                $foto=addslashes($data->val($i,6));
                $jenkel=addslashes($data->val($i,7));
                $tempat_lahir=addslashes($data->val($i,8));
                $tgl_lahir=addslashes($data->val($i,9));
                $kelas=addslashes($data->val($i,10));
                $jurusan=addslashes($data->val($i,11));
                $jenjang=addslashes($data->val($i,12));
                $agama=addslashes($data->val($i,13));
                $alamat=addslashes($data->val($i,14));
                $rt=addslashes($data->val($i,15));
                $rw=addslashes($data->val($i,16));
                $desa=addslashes($data->val($i,17));
                $kecamatan=addslashes($data->val($i,18));
                $kode_pos=addslashes($data->val($i,19));
                $transportasi=addslashes($data->val($i,20));
                $no_hp=addslashes($data->val($i,21));
                $tinggal=addslashes($data->val($i,22));
                $nik_ayah=addslashes($data->val($i,23));
                $nama_ayah=addslashes($data->val($i,24));
                $tgl_lahir_ayah=addslashes($data->val($i,25));
                $pendidikan_ayah=addslashes($data->val($i,26));
                $pekerjaan_ayah=addslashes($data->val($i,27));
                $penghasilan_ayah=addslashes($data->val($i,28));
                $nik_ibu=addslashes($data->val($i,29));
                $nama_ibu=addslashes($data->val($i,30));
                $tgl_lahir_ibu=addslashes($data->val($i,31));
                $pendidikan_ibu=addslashes($data->val($i,32));
                $pekerjaan_ibu=addslashes($data->val($i,33));
                $penghasilan_ibu=addslashes($data->val($i,34));
                $nik_wali=addslashes($data->val($i,35));
                $nama_wali=addslashes($data->val($i,36));
                $tgl_lahir_wali=addslashes($data->val($i,37));
                $pendidikan_wali=addslashes($data->val($i,38));
                $pekerjaan_wali=addslashes($data->val($i,39));
                $penghasilan_wali=addslashes($data->val($i,40));
                $no_kip=addslashes($data->val($i,41));
                $password=addslashes($data->val($i,42));

                
                    $datax = [
                        'no_daftar'=> $no_daftar,
                        'nik'=> $nik,
                        'nisn'=> $nisn,
                        'nama'=> $nama,
                        'foto'=> $foto,
                        'jenkel'=> $jenkel,
                        'tempat_lahir'=> $tempat_lahir,
                        'tgl_lahir'=> $tgl_lahir,
                        'kelas'=> $kelas,
                        'jurusan'=> $jurusan,
                        'jenjang'=> $jenjang,
                        'agama'=> $agama,
                        'alamat'=> $alamat,
                        'rt'=> $rt,
                        'rw'=> $rw,
                        'desa'=> $desa,
                        'kecamatan'=> $kecamatan,
                        'kode_pos'=> $kode_pos,
                        'transportasi'=> $transportasi,
                        'no_hp'=> $no_hp,
                        'tinggal'=> $tinggal,
                        'nik_ayah'=> $nik_ayah,
                        'nama_ayah'=> $nama_ayah,
                        'tgl_lahir_ayah'=> $tgl_lahir_ayah,
                        'pendidikan_ayah'=> $pendidikan_ayah,
                        'pekerjaan_ayah'=> $pekerjaan_ayah,
                        'penghasilan_ayah'=> $penghasilan_ayah,
                        'nik_ibu'=> $nik_ibu,
                        'nama_ibu'=> $nama_ibu,
                        'tgl_lahir_ibu'=> $tgl_lahir_ibu,
                        'pendidikan_ibu'=> $pendidikan_ibu,
                        'pekerjaan_ibu'=> $pekerjaan_ibu,
                        'penghasilan_ibu'=> $penghasilan_ibu,
                        'nik_wali'=> $nik_wali,
                        'nama_wali'=> $nama_wali,
                        'tgl_lahir_wali'=> $tgl_lahir_wali,
                        'pendidikan_wali'=> $pendidikan_wali,
                        'pekerjaan_wali'=> $pekerjaan_wali,
                        'penghasilan_wali'=> $penghasilan_wali,
                        'no_kip'=> $no_kip,
                        'password'=> $password,
                        'status'=> 1
                    ];
                    $exec = insert($koneksi, 'daftar', $datax);
                    ($exec) ? $sukses++ : $gagal++;
                
            }
            $total = $hasildata - 1;
            echo "Berhasil: $sukses | Gagal: $gagal | Dari: $total";
        }
    } else {
        echo "gagal";
    }
}
if ($pg == 'get_provinsi') {
    $getData = new GetData;
    $url = "https://referensi.data.kemdikbud.go.id/index11.php";
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
    $get = curl_exec($ch);
    $listProvinsi = $getData->listProvinsi($get);
    curl_close($ch);

    echo "<option value=''>Pilih Provinsi</option>";
    foreach ($listProvinsi as $prov) {
        echo "<option value='$prov[link]:$prov[prov_name]'>$prov[prov_name]</option>";
    }
    unset($getData);
}
if ($pg == 'get_kabupaten') {
    $provinsi = $_POST['provinsi'];
    $getData = new GetData;
    $url = "https://referensi.data.kemdikbud.go.id/" . $provinsi;
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
    $get = curl_exec($ch);
    $listKabupaten = $getData->listKabupaten($get);
    curl_close($ch);
    print_r($listKabupaten);
    echo "<option value=''>Pilih Kabupaten</option>";
    foreach ($listKabupaten as $kab) {
        echo "<option value='$kab[link]:$kab[kab_name]'>$kab[kab_name]</option>";
    }
    unset($getData);
}
if ($pg == 'get_kecamatan') {

    $data = explode(':', $_POST['kabupaten']);
    $kabupaten = $data[0];
    $getData = new GetData;
    $url = "https://referensi.data.kemdikbud.go.id/" . $kabupaten;
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
    $get = curl_exec($ch);
    $listKecamatan = $getData->listKecamatan($get);
    curl_close($ch);
    print_r($listKecamatan);
    echo "<option value=''>Pilih Kecamatan</option>";
    foreach ($listKecamatan as $kec) {
        echo "<option value='$kec[link]:$kec[kec_name]'>$kec[kec_name]</option>";
    }
    unset($getData);
}
if ($pg == 'get_sekolah') {
    $data = explode(':', $_POST['kec']);
    $kec = $data[0];
    $getData = new GetData;
    $url = "https://referensi.data.kemdikbud.go.id/" . $kec . "&level=3";
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
    $get = curl_exec($ch);
    $listNpsn = $getData->listNpsn($get);
    curl_close($ch);
    echo "
    <button type='submit' class='btn btn-primary float-right'>Ambil Data</button>
    <div class='form-check form-check-inline'>
    <label class='form-check-label'>
    
            <input class='form-check-input' type='checkbox'  id='checkAll'>Pilih Semua Sekolah

    </label>
    </div><br>";
    foreach ($listNpsn as $sekolah) {
        echo "
        <div class='form-check form-check-inline'>
        <label class='form-check-label'>
        
                <input class='form-check-input' type='checkbox' name='sekolah[]'  value='$sekolah[npsn]:$sekolah[nama_sekolah]'>$sekolah[npsn] - $sekolah[nama_sekolah]

        </label>
        </div><br>";
    }
    echo "<script>
    $('#checkAll').click(function() {
        $('input:checkbox').prop('checked', this.checked);
    });
    </script>";
    unset($getData);
}
