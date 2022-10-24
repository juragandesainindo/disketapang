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
        Schema::create('asset_umum_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_umum_id')->unsigned();
            $table->bigInteger('pegawai_id')->unsigned();
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
        Schema::dropIfExists('asset_umum_pegawai');
    }
}