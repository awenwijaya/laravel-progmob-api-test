<?php
    require_once 'koneksi.php';
    $id = $_POST['id'];
    $nama_acara_request = $_POST['nama_acara_request'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $alamat = $_POST['alamat'];
    $query = "UPDATE request_user SET nama_acara_request='$nama_acara_request',tanggal='$tanggal',lokasi='$lokasi',alamat='$alamat',keterangan='$keterangan', nama_pengguna='$nama_pengguna' WHERE id = '$id'";
    $exequery = mysqli_query($koneksi, $query);
    echo($exequery) ? json_encode(array('kode'=>1,'pesan'=>'data berhasil diupdate!')) : json_encode(array('kode'=>2,'pesan'=>'data gagal diupdate'));
?>
