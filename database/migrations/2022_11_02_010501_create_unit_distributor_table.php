<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitDistributorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_distributor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('bentuk_usaha');
            $table->string('alamat')->nullable();
            $table->string('link')->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('komoditi')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('unit_distributor');
    }
}