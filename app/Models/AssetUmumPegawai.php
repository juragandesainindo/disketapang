<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUmumPegawai extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'asset_umum_pegawai';
    protected $fillable = [
        'asset_umum_id',
        'pegawai_id',
        'jenis_barang',
        'merk_type',
        'nopol',
        'ukuran',
        'bahan_warna',
        'spesifikasi',
        'no_pabrik',
        'no_rangka',
        'no_mesin',
        'bpkb',
        'stnk',
        'masa_manfaat',
        'sisa_manfaat',
    ];

    public function assetUmum()
    {
        $this->belongsTo(AssetUmum::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}