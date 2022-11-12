<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerawatanAssetPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('perawatan_asset_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_umum_pegawai_id')->unsigned();
            $table->date('tgl');
            $table->string('uraian');
            $table->string('nilai');
            $table->string('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->foreign('asset_umum_pegawai_id')->references('id')->on('asset_umum_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('perawatan_asset_pegawai');
    }
}