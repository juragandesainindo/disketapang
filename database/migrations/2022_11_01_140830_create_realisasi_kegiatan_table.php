<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisasiKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan')->nullable();
            $table->string('apbd_murni')->nullable();
            $table->string('refocusing')->nullable();
            $table->string('apbd_p')->nullable();
            $table->string('realisasi_keuangan')->nullable();
            $table->string('realisasi_fisik')->nullable();
            $table->string('seharusnya')->nullable();
            $table->string('defiasi')->nullable();
            $table->string('tahun')->nullable();
            $table->bigInteger('realisasi_id')->unsigned();
            $table->timestamps();
            $table->foreign('realisasi_id')->references('id')->on('realisasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisasi_kegiatan');
    }
}