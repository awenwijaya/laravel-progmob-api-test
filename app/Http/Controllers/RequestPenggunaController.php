<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\Request::all();
        if(count($data)>0){
            $res['message'] = "SUCCESS";
            $res['result'] = $data;
            return response($res);
        }else {
            $res['message'] = "EMPTY";
            return response($res);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_acara_request = $request->input('nama_acara_request');
        $tanggal = $request->input('tanggal');
        $lokasi = $request->input('lokasi');
        $keterangan = $request->input('keterangan');
        $nama_pengguna = $request->input('nama_pengguna');
        $alamat = $request->input('alamat');
        $data = new \App\Models\Request;
        $data->nama_acara_request = $nama_acara_request;
        $data->tanggal = $tanggal;
        $data->lokasi = $lokasi;
        $data->alamat = $alamat;
        $data->keterangan = $keterangan;
        $data->nama_pengguna = $nama_pengguna;
        if($data->save()){
            return response()->json([
                'message' => 'Data berhasil ditambahkan!',
                'data' => $data,
            ]);
            return response($res);
        }else{
            return response()->json([
                'message' => 'Gagal',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Models\Request::where('id',$id)->get();
        if(count($data)>0){
            $res['message'] = "SUKSES";
            $res['values'] = $data;
            return response($res);
        } else{
            $res['message'] = "GAGAL";
            return response($res);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $nama_acara_request = $request->input('nama_acara');
        $tanggal = $request->input('tanggal');
        $lokasi = $request->input('lokasi');
        $keterangan = $request->input('keterangan');
        $nama_pengguna = $request->input('nama_pengguna');
        $alamat = $request->input('alamat');
        $data = \App\Models\Request::where('id',$id)->first();
        $data->nama_acara_request = $nama_acara_request;
        $data->tanggal = $tanggal;
        $data->lokasi = $lokasi;
        $data->alamat = $alamat;
        $data->keterangan = $keterangan;
        $data->nama_pengguna = $nama_pengguna;
        if($data->save()){
            return response()->json([
                'message' => 'Data berhasil ditambahkan!',
                'data' => $data,
            ]);
            return response($res);
        }else{
            return response()->json([
                'message' => 'Gagal',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $data = \App\Models\Request::where('id',$id)->first();
        if($data->delete()){
            $res['message'] = "SUKSES";
            $res['value'] = $data;
            return response($res);
        }else{
            $res['message'] = "GAGAL";
            return response($res);
        }
    }
}
