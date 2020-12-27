<?php
    require_once 'koneksi.php';
        $nama_acara_request = $_POST['nama_acara_request'];
        $tanggal = $_POST['tanggal'];
        $lokasi = $_POST['lokasi'];
        $keterangan = $_POST['keterangan'];
        $nama_pengguna = $_POST['nama_pengguna'];
        $alamat = $_POST['alamat'];
        $query = "INSERT INTO request_user(nama_acara_request, tanggal, lokasi, keterangan, nama_pengguna, alamat) VALUES ('$nama_acara_request','$tanggal','$lokasi','$keterangan', '$nama_pengguna', '$alamat')";
        $exequery = mysqli_query($koneksi, $query);
        echo($exequery) ? json_encode(array('kode'=>1,'pesan'=>'berhasil menambahkan data')) : json_encode(array('kode'=>2,'pesan'=>'data gagal ditambahkan'));
 
?>