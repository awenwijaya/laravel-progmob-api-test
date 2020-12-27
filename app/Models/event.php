<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
  		'nama_acara',
		'tanggal_acara',
		'tempat_acara',
		'alamat',
		'keterangan',
    ];

   
}
