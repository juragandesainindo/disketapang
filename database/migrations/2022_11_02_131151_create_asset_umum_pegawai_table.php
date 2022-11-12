<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetUmumPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('asset_umum_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_umum_id')->unsigned();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->string('jenis_barang');
            $table->string('merk_type');
            $table->string('nopol')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('bahan_warna')->nullable();
            $table->string('spesifikasi')->nullable();
            $table->string('no_pabrik')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('bpkb')->nullable();
            $table->string('stnk')->nullable();
            $table->string('masa_manfaat')->nullable();
            $table->string('sisa_manfaat')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('asset_umum_pegawai');
    }
}