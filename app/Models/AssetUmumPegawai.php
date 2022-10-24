<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUmumPegawai extends Model
{
    use HasFactory;

    protected $table = 'asset_umum_pegawai';
    protected $fillable = [
        'asset_umum_id', 'pegawai_id'
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