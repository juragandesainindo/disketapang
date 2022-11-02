<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwtBeritaBantuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwt_berita_bantuan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_barang');
            $table->string('jumlah');
            $table->string('satuan');
            $table->string('keterangan')->nullable();
            $table->bigInteger('kwt_berita_id')->unsigned();
            $table->timestamps();
            $table->foreign('kwt_berita_id')->references('id')->on('kwt_berita')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kwt_berita_bantuan');
    }
}