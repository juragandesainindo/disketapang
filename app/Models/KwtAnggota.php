<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwtAnggota extends Model
{
    use HasFactory;

    protected $table = 'kwt_anggota';
    protected $fillable = [
    	'nama_anggota','ktp','jenis_kelamin','telepon','kwt_kelompok_id'
    ];

    public function kelompok()
    {
    	return $this->belongsTo(KwtKelompok::class);
    }
}
