<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRequestPengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_request_pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama_acara-_request');
            $table->string('tanggal');
            $table->string('lokasi');
            $table->string('keterangan');
            $table->string('nama_pengguna');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_request_pengguna');
    }
}
