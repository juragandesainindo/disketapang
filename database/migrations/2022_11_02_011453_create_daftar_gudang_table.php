<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarGudangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_gudang', function (Blueprint $table) {
            $table->id();
            $table->string('bentuk_usaha');
            $table->string('nama_perusahaan');
            $table->text('alamat_perusahaan')->nullable();
            $table->string('telepon_perusahaan')->nullable();
            $table->string('penanggung_jwb_perusahaan')->nullable();
            $table->text('alamat_gudang')->nullable();
            $table->string('telepon_gudang')->nullable();
            $table->string('penanggung_jwb_gudang')->nullable();
            $table->string('no_tdg')->nullable();
            $table->text('jenis_gudang')->nullable();
            $table->string('luas_gudang')->nullable();
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
        Schema::dropIfExists('daftar_gudang');
    }
}