<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasarJenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasar_jenis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasar');
            $table->text('alamat');
            $table->string('link')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('foto')->nullable();
            $table->bigInteger('pasar_lembaga_id')->unsigned();
            $table->timestamps();
            $table->foreign('pasar_lembaga_id')->references('id')->on('pasar_lembaga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasar_jenis');
    }
}