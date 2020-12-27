<?php
    require_once 'koneksi.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama_acara = $_POST['nama_acara'];
        $tanggal_acara = $_POST['tanggal_acara'];
        $tempat_acara = $_POST['tempat_acara'];
        $alamat = $_POST['alamat'];
        $keterangan = $_POST['keterangan'];
        $query = "INSERT INTO event(nama_acara, tanggal_acara, tempat_acara, alamat, keterangan) VALUES ('$nama_acara','$tanggal_acara','$tempat_acara','$alamat', '$keterangan')";
        $exequery = mysqli_query($koneksi, $query);
        echo($exequery) ? json_encode(array('kode'=>1,'pesan'=>'berhasil menambahkan data')) : json_encode(array('kode'=>2,'pesan'=>'data gagal ditambahkan'));
    }else{
        echo json_encode(array('kode'=>101,'pesan'=>'request tidak valid'));
    }
?>