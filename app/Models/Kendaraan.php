<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $fillable = [
        'registrasi',
        'nama',
        'alamat',
        'merk',
        'type',
        'jenis',
        'model',
        'tahun_pembuatan',
        'silinder',
        'no_rangka',
        'no_mesin',
        'warna',
        'bahan_bakar',
        'warna_tnkb',
        'berlaku',
        'image',
        'image_s_kiri',
        'image_s_kanan',
        'image_belakang',
        'image_dalam',
        'image_mesin',
    ];

    // protected $dates =['berlaku'];

    public function kendaraanimage()
    {
        return $this->hasMany(KendaraanImage::class);
    }
}