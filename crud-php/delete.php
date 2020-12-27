<?php
    require_once 'koneksi.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $query = "DELETE FROM event WHERE id = '$id'";
        $exequery = mysqli_query($koneksi, $query);
        echo($exequery) ? json_encode(array('kode'=>1,'pesan'=>'berhasil menghapus data')) : json_encode(array('kode'=>2,'pesan'=>'data gagal dihapus'));
    }else{
        echo json_encode(array('kode'=>101,'pesan'=>'request tidak valid'));
    }
?>