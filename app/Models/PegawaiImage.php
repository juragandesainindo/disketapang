<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiImage extends Model
{
    use HasFactory;

    protected $table = 'pegawai_image';
    protected $fillable = [
    	'keterangan','image_pegawai','pegawai_id'
    ];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
}
