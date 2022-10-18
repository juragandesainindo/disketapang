<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasHargaPangan extends Model
{
    use HasFactory;

    protected $table = 'komoditas_harga_pangan';
    protected $fillable = [
    	'komoditas','keterangan'
    ];

    public function harga()
    {
    	return $this->hasMany(HargaPangan::class);
    }
}
