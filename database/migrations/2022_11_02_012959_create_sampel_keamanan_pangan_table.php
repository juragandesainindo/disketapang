<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampelKeamananPanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampel_keamanan_pangan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pemeriksaan');
            $table->string('lokasi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('sayuran')->nullable();
            $table->string('buah')->nullable();
            $table->string('lainnya')->nullable();
            $table->string('asal')->nullable();
            $table->string('hasil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sampel_keamanan_pangan');
    }
}