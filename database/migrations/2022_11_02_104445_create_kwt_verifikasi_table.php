<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwtVerifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwt_verifikasi', function (Blueprint $table) {
            $table->id();
            $table->text('latar_belakang');
            $table->text('landasan_hukum');
            $table->text('maksud')->nullable();
            $table->text('kegiatan')->nullable();
            $table->text('hasil')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->text('saran')->nullable();
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
        Schema::dropIfExists('kwt_verifikasi');
    }
}