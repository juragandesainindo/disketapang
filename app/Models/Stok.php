<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'cadangan_pangan_stok';
    protected $fillable = [
    	'komoditi','stok_awal','stok_akhir','satuan','tanggal','cadangan_pangan_id'
    ];

    public function cadanganPangan()
    {
    	return $this->belongsTo(CadanganPangan::class);
    }
}
