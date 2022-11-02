<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwtKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwt_kelurahan', function (Blueprint $table) {
            $table->id();
            $table->string('kelurahan');
            $table->bigInteger('kwt_kecamatan_id')->unsigned();
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
        Schema::dropIfExists('kwt_kelurahan');
    }
}