<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('registrasi');
            $table->string('nama');
            $table->string('alamat');
            $table->string('merk');
            $table->string('type');
            $table->string('jenis');
            $table->string('model');
            $table->string('tahun_pembuatan');
            $table->string('silinder');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->string('warna');
            $table->string('bahan_bakar');
            $table->string('warna_tnkb');
            $table->string('berlaku');
            $table->string('image');
            $table->string('image_s_kiri')->nullable();
            $table->string('image_s_kanan')->nullable();
            $table->string('image_belakang')->nullable();
            $table->string('image_dalam')->nullable();
            $table->string('image_mesin')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('kendaraan');
    }
}