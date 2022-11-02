<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwtProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwt_proposal', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->string('file');
            $table->bigInteger('kwt_kelompok_id')->unsigned();
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
        Schema::dropIfExists('kwt_proposal');
    }
}
