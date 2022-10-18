<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan_image', function (Blueprint $table) {
            $table->id();
            $table->string('image_belakang')->nullable();
            $table->string('image_samping')->nullable();
            $table->string('image_dalam')->nullable();
            $table->string('image_mesin')->nullable();
            $table->foreign('kendaraan_id')
                ->references('id')
                ->on('kendaraan')
                ->onDelete('cascade');
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
        Schema::dropIfExists('kendaraan_image');
    }
}
