<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDktKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dkt_kelurahan', function (Blueprint $table) {
            $table->id();
            $table->string('kelurahan');
            $table->bigInteger('dkt_kecamatan_id')->unsigned();
            $table->timestamps();
            $table->foreign('dkt_kecamatan_id')->references('id')->on('dkt_kecamatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dkt_kelurahan');
    }
}