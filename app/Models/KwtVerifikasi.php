<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KwtVerifikasi extends Model
{
    use HasFactory;

    protected $table = 'kwt_verifikasi';
    protected $fillable = [
    	'latar_belakang','landasan_hukum','maksud','kegiatan','hasil','kesimpulan','saran','kwt_kelompok_id'
    ];
    
    public function kwtProposal()
    {
        return $this->belongsTo(KwtProposal::class);
    }
    
    public function kwtKelompok()
    {
        return $this->belongsTo(KwtKelompok::class);
    }
}
