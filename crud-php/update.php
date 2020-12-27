<?php
    require_once 'koneksi.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $nama_acara = $_POST['nama_acara'];
        $tanggal_acara = $_POST['tanggal_acara'];
        $tempat_acara = $_POST['tempat_acara'];
        $alamat = $_POST['alamat'];
        $keterangan = $_POST['keterangan'];
        $query = "UPDATE event SET nama_acara='$nama_acara',tanggal_acara='$tanggal_acara',tempat_acara='$tempat_acara',alamat='$alamat',keterangan='$keterangan' WHERE id = '$id'";
        $exequery = mysqli_query($koneksi, $query);
        echo($exequery) ? json_encode(array('kode'=>1,'pesan'=>'data berhasil diupdate!')) : json_encode(array('kode'=>2,'pesan'=>'data gagal diupdate'));
     }else{
         echo json_encode(array('kode'=>101,'pesan'=>'request tidak valid'));
     }
?>