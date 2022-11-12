<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerawatanAssetPegawai extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'perawatan_asset_pegawai';
    protected $guarded = [];

    public function assetUmumPegawai()
    {
        return $this->belongsTo(AssetUmumPegawai::class);
    }
}