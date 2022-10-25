<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiPendidikanUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_pendidikan_umum', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->string('jenjang_pendidikan', 20);
            $table->string('jurusan')->nullable();
            $table->string('nama_sekolah');
            $table->string('tahun_lulus', 20);
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai_pendidikan_umum');
    }
}