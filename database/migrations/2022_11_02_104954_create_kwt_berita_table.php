<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwtBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwt_berita', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kwt_kelompok_id')->unsigned();
            $table->text('pendahuluan');
            $table->text('kesimpulan');
            $table->date('tanggal');
            $table->timestamps();
            $table->foreign('kwt_kelompok_id')->references('id')->on('kwt_kelompok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kwt_berita');
    }
}
