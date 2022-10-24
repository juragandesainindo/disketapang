<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            // 'nip', 'nama', 'npwp', 'jk', 'tempat_lahir', 'tgl_lahir', 'agama', 'alamat', 'bpjs', 'telepon', 'email', 'foto'
            $table->string('nip');
            $table->string('nama');
            $table->string('jk');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('email');
            $table->string('foto_diri');
            $table->string('kk')->nullable();
            $table->string('ktp')->nullable();
            $table->string('akte')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bpjs')->nullable();
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
        Schema::dropIfExists('pegawai');
    }
}