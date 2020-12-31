<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'request_user';

    protected $fillable = [
  		'nama_acara_request',
		'tanggal',
		'lokasi',
		'keterangan',
        'nama_pengguna',
        'alamat',
    ];
}
