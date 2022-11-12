<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUmumBast extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'asset_umum_bast';
    protected $fillable = [
        'asset_umum_id', 'keterangan', 'kategori'
    ];
}