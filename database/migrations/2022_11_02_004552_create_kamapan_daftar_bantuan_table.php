<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamapanDaftarBantuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamapan_daftar_bantuan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_barang')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('satuan')->nullable();
            $table->string('keterangan')->nullable();
            $table->bigInteger('kamapan_daftar_id')->unsigned();
            $table->timestamps();
            $table->foreign('kamapan_daftar_id')->references('id')->on('kamapan_daftar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamapan_daftar_bantuan');
    }
}