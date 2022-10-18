<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DataKampungPangan extends Model
{
    use HasFactory;

    protected $table = 'data_kampung_pangan';
    protected $fillable = [
    	'nama','alamat','kecamatan','tahun','jumlah_anggota','jenis_pelatihan','jenis_bantuan','file'
    ];
}
