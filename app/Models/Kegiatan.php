<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'realisasi_kegiatan';
    protected $fillable = [
    	'nama_kegiatan','apbd_murni','refocusing','apbd_p','realisasi_keuangan','realisasi_fisik','seharusnya','tahun','defiasi','realisasi_id'
    ];

    public function realisasi()
    {
    	return $this->belongsTo(Realisasi::class);
    }
}
