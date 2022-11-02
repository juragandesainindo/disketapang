<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFsvaPetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fsva_peta', function (Blueprint $table) {
            $table->id();
            $table->string('peta');
            $table->string('ket')->nullable();
            $table->bigInteger('fsva_id')->unsigned();
            $table->timestamps();
            $table->foreign('fsva_id')->references('id')->on('fsva')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fsva_peta');
    }
}