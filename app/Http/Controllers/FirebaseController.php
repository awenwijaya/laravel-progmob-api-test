<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    //
    public function Notifikasi(){
    	$ch=curl_init("https://fcm.googleapis.com/fcm/send");
        $header=array("Content-Type:application/json", "Authorization: key=AAAAOq_52F4:APA91bFhI4WGi9HvN3-23ckIdp7ILXpA6pq_c8z2mlKhEC8jsb3kaRZ0aEUGrMjkY9EG9w8zoNIrZ34L0qI-vBdd6kgWZTvoTa9LDe97vSZo_s8vTRfRcOyWu1w9b5Dgx-NSHlgCr4M8");
        $data=json_encode(array("to"=>"/topics/alldevices","data"=>array("title"=>"", "message"=>"Ada Jadwal Acara Baru di STT!")));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_exec($ch);
    }
}
