<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadanganPanganStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadangan_pangan_stok', function (Blueprint $table) {
            $table->id();
            $table->string('komoditi');
            $table->string('stok_awal')->nullable();
            $table->string('stok_akhir')->nullable();
            $table->string('satuan')->nullable();
            $table->date('tanggal');
            $table->bigInteger('cadangan_pangan_id')->unsigned();
            $table->timestamps();
            $table->foreign('cadangan_pangan_id')->references('id')->on('cadangan_pangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadangan_pangan_stok');
    }
}