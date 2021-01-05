<?php
    require_once 'koneksi.php';
    $server_ip = gethostbyname(gethostname());
    $upload_path = 'image/';
    $upload_url = 'http://'.$server_ip.'/'.$upload_path;
    $response = array();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama_acara_request = $_POST['nama_acara_request'];
            $fileinfo = pathinfo($_FILES['image']['name']);
            $file_url = $upload_url.'IMG_REQUEST_'.$nama_acara_request.'.jpg';
            $file_path = $upload_path.'IMG_REQUEST_'.$nama_acara_request.'.jpg';
            try{
                move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
                $sql = "UPDATE request_user SET photo = '$file_url' WHERE nama_acara_request='$nama_acara_request';";
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