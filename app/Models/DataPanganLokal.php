<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DataPanganLokal extends Model
{
    use HasFactory;

    protected $table = 'data_pangan_lokal';
    protected $fillable = [
    	'jenis_komoditi','jenis_olahan','surat_ijin','keterangan','kwt_kelompok_id'
    ];

    public function kwtKelompok()
    {
    	return $this->belongsTo(KwtKelompok::class);
    }
}
