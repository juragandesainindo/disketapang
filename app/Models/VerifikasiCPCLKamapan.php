<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class VerifikasiCPCLKamapan extends Model
{
    use HasFactory;

    protected $table = 'kamapan_verifikasi_cpcl';
    protected $fillable = [
    	'dkt_kelompok_id','latar_belakang','landasan_hukum','maksud','kegiatan','hasil','kesimpulan','saran'
    ];
    protected $dates = ['tanggal'];

    public function dktKelompok()
    {
    	return $this->belongsTo(DktKelompok::class);
    }
}
