<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_jabatan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->string('nama_jabatan');
            $table->string('eselon');
            $table->date('tmt_jabatan');
            $table->date('akhir_jabatan');
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
        Schema::dropIfExists('pegawai_jabatan');
    }
}