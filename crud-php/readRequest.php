<?php
    require_once 'koneksi.php';
    $query = "SELECT * FROM request_user";
    $result = mysqli_query($koneksi, $query);
    $array = array();
    while($row=mysqli_fetch_assoc($result)){
        $array[] = $row;
    }
    echo($result) ?
    json_encode(array("kode"=>1,"result"=>$array)) :
    json_encode(array("kode"=>0,"pesan"=>"data tidak ditemukan"));
?>
