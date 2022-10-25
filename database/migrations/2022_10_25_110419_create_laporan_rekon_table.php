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
            $table->bigInteger('kasubag_umum')->unsigned();
            $table->bigInteger('pengurus_barang')->unsigned();
            $table->string('nama2')->nullable();
            $table->string('nip2')->nullable();
            $table->string('pangkat2')->nullable();
            $table->string('jabatan2')->nullable();
            $table->string('nama_skpd')->nullable();
            $table->string('nip_skpd')->nullable();
            $table->string('kode_belanja')->nullable();
            $table->string('uraian_belanja')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->timestamps();
            $table->foreign('asset_umum_id')->references('id')->on('asset_umum')->onDelete('cascade');
            $table->foreign('kasubag_umum')->references('id')->on('pegawai')->onDelete('cascade');
            $table->foreign('pengurus_barang')->references('id')->on('pegawai')->onDelete('cascade');
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