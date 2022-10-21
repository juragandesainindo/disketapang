<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUmum extends Model
{
    use HasFactory;
    protected $table = 'asset_umum';
    protected $guarded = [];

    // public function setPemakaiAttribute($value)
    // {
    //     $this->attributes['pemakai'] = json_encode($value);
    // }

    // public function getPemakaiAttribute($value)
    // {
    //     return $this->attributes['pemakai'] = json_decode($value);
    // }

    public function mappingAsset()
    {
        return $this->belongsTo(MappingAsset::class);
    }
}