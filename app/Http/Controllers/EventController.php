<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = event::all();
        return response()->json([
            'message' => 'BERHASIL',
            'result' => $data,
        ]);
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
        $nama_acara = $request->input('nama_acara');
        $tanggal_acara = $request->input('tanggal_acara');
        $tempat_acara = $request->input('tempat_acara');
        $alamat = $request->input('alamat');
        $keterangan = $request->input('keterangan');
        $data = new \App\Models\event;
        $data->nama_acara = $nama_acara;
        $data->tanggal_acara = $tanggal_acara;
        $data->tempat_acara = $tempat_acara;
        $data->alamat = $alamat;
        $data->keterangan = $keterangan;
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
        $data = \App\Models\event::where('id',$id)->get();
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
        $nama_acara = $request->input('nama_acara');
        $tanggal_acara = $request->input('tanggal_acara');
        $tempat_acara = $request->input('tempat_acara');
        $alamat = $request->input('alamat');
        $keterangan = $request->input('keterangan');
        $data = \App\Models\event::where('id',$id)->first();
        $data->nama_acara = $nama_acara;
        $data->tanggal_acara = $tanggal_acara;
        $data->tempat_acara = $tempat_acara;
        $data->alamat = $alamat;
        $data->keterangan = $keterangan;
        if($data->save()){
            return response()->json([
                'message' => 'Data berhasil diperbaharui',
                'data' => $data,
            ]);
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
        $data = \App\Models\event::where('id',$id)->first();
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
