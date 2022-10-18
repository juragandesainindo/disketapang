<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampelKeamananPangan extends Model
{
    use HasFactory;
    
    protected $table = 'sampel_keamanan_pangan';
    protected $fillable = ['tgl_pemeriksaan','lokasi','alamat','sayuran','buah','lainnya','asal','hasil'];
    protected $dates =['tgl_pemeriksaan'];
}
