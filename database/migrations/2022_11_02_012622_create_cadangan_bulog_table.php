<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadanganBulogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadangan_bulog', function (Blueprint $table) {
            $table->id();
            $table->string('pengadaan');
            $table->string('stok')->nullable();
            $table->date('tgl_stok')->nullable();
            $table->string('belanja')->nullable();
            $table->date('tgl_belanja')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('satuan')->nullable();
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
        Schema::dropIfExists('cadangan_bulog');
    }
}