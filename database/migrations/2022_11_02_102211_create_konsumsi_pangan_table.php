<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsumsiPanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumsi_pangan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kwt_kecamatan_id')->unsigned();
            $table->string('skor_pph');
            $table->timestamps();
            $table->foreign('kwt_kecamatan_id')->references('id')->on('kwt_kecamatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsumsi_pangan');
    }
}