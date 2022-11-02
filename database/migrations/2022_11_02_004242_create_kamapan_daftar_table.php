<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamapanDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamapan_daftar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dkt_kelompok_id')->unsigned();
            $table->date('tanggal');
            $table->timestamps();
            $table->foreign('dkt_kelompok_id')->references('id')->on('dkt_kelompok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamapan_daftar');
    }
}