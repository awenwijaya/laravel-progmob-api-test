<?php
    require_once 'koneksi.php';
    $id = $_POST['id'];
    $query = "DELETE FROM request_user WHERE id = '$id'";
    $exequery = mysqli_query($koneksi, $query);
    echo($exequery) ? json_encode(array('kode'=>1,'pesan'=>'berhasil menghapus data')) : json_encode(array('kode'=>2,'pesan'=>'data gagal dihapus'));
?>