<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamapanDaftar extends Model
{
    use HasFactory;

    protected $table = 'kamapan_daftar';
    protected $fillable = [
    	'dkt_kelompok_id','tanggal'
    ];

    public function dktKelompok()
    {
    	return $this->belongsTo(DktKelompok::class);
    }
    
    public function kamapanDaftarBantuan()
    {
    	return $this->hasMany(KamapanDaftarBantuan::class);
    }
}
