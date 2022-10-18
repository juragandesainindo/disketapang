<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BAKamapan extends Model
{
    use HasFactory;

    protected $table = 'ba_kamapan';
    protected $fillable = [
    	'no_sk','nama_kelompok','jabatan_kelompok','alamat_kelompok'
    ];

    public function kelompokkelurahan()
    {
    	return $this->belongsTo(KelompokKelurahan::class);
    }
}
