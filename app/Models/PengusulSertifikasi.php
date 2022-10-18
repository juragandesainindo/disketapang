<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengusulSertifikasi extends Model
{
    use HasFactory;
    protected $table = 'pengusul_sertifikasi';
    protected $fillable = ['dkt_kelompok_id'];
    
    public function dktKelompok()
    {
        return $this->belongsTo(DktKelompok::class);
    }
}
