<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwtManfaatBantuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwt_manfaat_bantuan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_barang');
            $table->string('jumlah');
            $table->string('satuan');
            $table->string('keterangan');
            $table->bigInteger('kwt_manfaat_id')->unsigned();
            $table->timestamps();
            $table->foreign('kwt_manfaat_id')->references('id')->on('kwt_manfaat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kwt_manfaat_bantuan');
    }
}
