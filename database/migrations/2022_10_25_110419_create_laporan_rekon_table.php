<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanRekonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_rekon', function (Blueprint $table) {
            $table->id();
            $table->integer('no_surat');
            $table->string('kode_surat');
            $table->bigInteger('asset_umum_id')->unsigned();
            $table->string('kasubag_nama');
            $table->string('kasubag_nip');
            $table->bigInteger('pegawai_id')->unsigned();
            $table->string('nama_skpd')->nullable();
            $table->string('nip_skpd')->nullable();
            $table->string('pangkat_skpd')->nullable();
            $table->string('jabatan_skpd')->nullable();
            $table->string('nama_kepala_skpd')->nullable();
            $table->string('nip_kepala_skpd')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('kode_belanja')->nullable();
            $table->string('uraian_belanja')->nullable();
            $table->timestamps();
            $table->foreign('asset_umum_id')->references('id')->on('asset_umum')->onDelete('cascade');
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
        Schema::dropIfExists('laporan_rekon');
    }
}