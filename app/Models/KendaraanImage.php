<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanImage extends Model
{
    use HasFactory;

    protected $table = 'kendaraan_image';
    protected $fillable = [
    	'title_image','image_kendaraan','kendaraan_id'
    ];

    public function kendaraan()
    {
    	return $this->belongsTo(Kendaraan::class);
    }
}
