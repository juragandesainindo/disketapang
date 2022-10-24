<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiPangkatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_pangkat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->string('nama_pangkat');
            $table->string('no_sk');
            $table->date('tgl_sk');
            $table->date('tmt_pangkat');
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai_pangkat');
    }
}