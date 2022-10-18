<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerawatanAssetUmum extends Model
{
    use HasFactory;
    protected $table = 'perawatan_asset_umum';
    protected $guarded = [];

    public function assetUmum()
    {
        return $this->belongsTo(AssetUmum::class);
    }
}