<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasi';

    protected $fillable = [
    	'nama_organisasi','kedudukan','tempat','nama_pimpinan','foto','pegawai_id'
    ];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
}
