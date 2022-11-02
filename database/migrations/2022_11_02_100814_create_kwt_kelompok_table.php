<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwtKelompokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwt_kelompok', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kwt');
            $table->string('ketua');
            $table->string('telepon', 20);
            $table->string('ppl')->nullable();
            $table->text('alamat')->nullable();
            $table->string('link')->nullable();
            $table->string('luas_lahan')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('kwt_kecamatan_id')->unsigned();
            $table->bigInteger('kwt_kelurahan_id')->unsigned();
            $table->timestamps();
            $table->foreign('kwt_kecamatan_id')->references('id')->on('kwt_kecamatan')->onDelete('cascade');
            $table->foreign('kwt_kelurahan_id')->references('id')->on('kwt_kelurahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kwt_kelompok');
    }
}