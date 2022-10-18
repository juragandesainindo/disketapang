<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanKepemimpinan extends Model
{
    use HasFactory;

    protected $table = 'pelatihan_kepemimpinan';

    protected $fillable = [
    	'nama_diklat','angkatan','tahun','tempat','panitia','foto','pegawai_id'
    ];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
}
