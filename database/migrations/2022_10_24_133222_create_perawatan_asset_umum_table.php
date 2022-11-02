<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerawatanAssetUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('perawatan_asset_umum', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_umum_id')->unsigned();
            $table->date('tgl');
            $table->string('uraian');
            $table->string('nilai');
            $table->string('keterangan')->nullable();
            $table->string('foto')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('perawatan_asset_umum');
    }
}