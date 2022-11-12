<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetUmumBastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('asset_umum_bast', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_umum_id')->unsigned();
            $table->text('keterangan');
            $table->string('kategori', 20);
            $table->timestamps();
            $table->foreign('asset_umum_id')->references('id')->on('asset_umum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('asset_umum_bast');
    }
}