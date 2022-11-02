<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwtAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwt_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->string('ktp')->nullable();
            $table->string('jenis_kelamin', 20);
            $table->string('telepon', 20)->nullable();
            $table->bigInteger('kwt_kelompok_id')->unsigned();
            $table->timestamps();
            $table->foreign('kwt_kelompok_id')->references('id')->on('kwt_kelompok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kwt_anggota');
    }
}
