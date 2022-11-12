<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('asset_umum', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mapping_asset_id')->unsigned();
            $table->date('tgl_perolehan');
            $table->string('nilai_brg', 100);
            $table->string('nilai_perolehan', 100)->nullable();
            $table->string('nilai_surut', 100)->nullable();
            $table->string('sertifikat', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->string('luas', 100)->nullable();
            $table->string('penggunaan', 200)->nullable();
            $table->text('keterangan')->nullable();
            $table->string('jenis_sertifikat', 100)->nullable();
            $table->string('penanggung_jawab', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('status_asset', 100)->nullable();
            $table->string('masa_manfaat', 100)->nullable();
            $table->string('sisa_manfaat', 100)->nullable();
            $table->string('kontruksi', 100)->nullable();
            $table->string('latitude', 100)->nullable();
            $table->string('longitude', 100)->nullable();
            $table->string('tingkat', 100)->nullable();
            $table->string('imb', 100)->nullable();
            $table->string('panjang', 30)->nullable();
            $table->string('lebar', 30)->nullable();
            $table->string('judul', 100)->nullable();
            $table->string('penerbit', 100)->nullable();
            $table->string('pencipta', 100)->nullable();
            $table->string('asal', 100)->nullable();
            $table->string('bahan', 100)->nullable();
            $table->string('spesifikasi', 100)->nullable();
            $table->string('kdp', 100)->nullable();
            $table->string('dokumen', 100)->nullable();
            $table->date('tgl_dokumen')->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->string('nama_developer', 100)->nullable();
            $table->string('kontak_developer', 100)->nullable();
            $table->string('instansi_developer', 100)->nullable();
            $table->string('kategori', 20)->nullable();
            $table->timestamps();
            $table->foreign('mapping_asset_id')->references('id')->on('mapping_asset')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('asset_umum');
    }
}