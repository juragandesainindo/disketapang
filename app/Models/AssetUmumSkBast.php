<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUmumSkBast extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'asset_umum_sk_bast';
    protected $fillable = [
        'keterangan', 'kategori'
    ];
}