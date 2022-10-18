<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DaftarGudang extends Model
{
    use HasFactory;

    protected $table = 'daftar_gudang';
    protected $fillable = [
    	'bentuk_usaha','nama_perusahaan','alamat_perusahaan','telepon_perusahaan','penanggung_jwb_perusahaan','alamat_gudang','telepon_gudang','penanggung_jwb_gudang',
    	'no_tdg','jenis_gudang','luas_gudang'
    ];
}
