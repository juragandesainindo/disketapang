<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPanganLokalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pangan_lokal', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_komoditi');
            $table->string('jenis_olahan');
            $table->string('surat_ijin');
            $table->string('keterangan');
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
        Schema::dropIfExists('data_pangan_lokal');
    }
}
