<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanRekon extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'laporan_rekon';
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function assetUmum()
    {
        return $this->belongsTo(AssetUmum::class);
    }
}