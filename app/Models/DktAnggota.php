<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DktAnggota extends Model
{
    use HasFactory;

    protected $table = 'dkt_anggota';
    protected $fillable = [
    	'nama_anggota','ktp','jenis_kelamin','komoditas','volume','dkt_kelompok_id'
    ];

    public function dktKelompok()
    {
    	return $this->belongsTo(DktKelompok::class);
    }
}
