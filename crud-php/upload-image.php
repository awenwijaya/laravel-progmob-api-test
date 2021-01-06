<?php
    require_once 'koneksi.php';
    $server_ip = gethostbyname(gethostname());
    $upload_path = 'image/';
    $upload_url = 'http://'.$server_ip.'/newfolder2/laravel-progmob-api-test/crud-php/'.$upload_path;
    $response = array();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama_acara = $_POST['nama_acara'];
            $fileinfo = pathinfo($_FILES['image']['name']);
            $file_url = $upload_url.'IMG_'.$nama_acara.'.jpg';
            $file_path = $upload_path.'IMG_'.$nama_acara.'.jpg';
            try{
                move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
                $sql = "UPDATE event SET photo = '$file_path' WHERE nama_acara='$nama_acara';";
                if(mysqli_query($koneksi, $sql)){
                    $response['error'] = false;
                }
            }
            catch(Exception $e){
                $response['error']=true;
                $response['message']=$e->getMessage();
            }
            echo json_encode($response);
    }
?>