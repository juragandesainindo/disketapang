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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('registrasi')->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('merk')->nullable();
            $table->string('type')->nullable();
            $table->string('jenis')->nullable();
            $table->string('model')->nullable();
            $table->string('tahun_pembuatan')->nullable();
            $table->string('silinder')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('warna')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->string('warna_tnkb')->nullable();
            $table->date('berlaku');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('kendaraan');
    }
}
