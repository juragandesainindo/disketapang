<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_umum';

    protected $fillable = [
    	'jenjang_pendidikan','jurusan','nama_sekolah','tahun_lulus','foto','pegawai_id'
    ];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
}
