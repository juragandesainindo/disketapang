<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpgPetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skpg_peta', function (Blueprint $table) {
            $table->id();
            $table->string('peta');
            $table->string('keterangan')->nullable();
            $table->bigInteger('skpg_id')->unsigned();
            $table->timestamps();
            $table->foreign('skpg_id')->references('id')->on('skpg')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skpg_peta');
    }
}