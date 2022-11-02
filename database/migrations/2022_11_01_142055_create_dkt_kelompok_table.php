<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDktKelompokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dkt_kelompok', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dkt');
            $table->text('alamat')->nullable();
            $table->string('link')->nullable();
            $table->string('ketua')->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('ppl')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('dkt_kecamatan_id')->unsigned();
            $table->bigInteger('dkt_kelurahan_id')->unsigned();
            $table->timestamps();
            $table->foreign('dkt_kecamatan_id')->references('id')->on('dkt_kecamatan')->onDelete('cascade');
            $table->foreign('dkt_kelurahan_id')->references('id')->on('dkt_kelurahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dkt_kelompok');
    }
}