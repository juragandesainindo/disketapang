<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDktAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dkt_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->string('ktp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('komoditas')->nullable();
            $table->string('volume')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('dkt_kelompok_id')->unsigned();
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
        Schema::dropIfExists('dkt_anggota');
    }
}