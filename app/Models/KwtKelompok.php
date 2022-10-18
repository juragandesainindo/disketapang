<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwtKelompok extends Model
{
    use HasFactory;

    protected $table = 'kwt_kelompok';
    protected $fillable = [
    	'nama_kwt', 'ketua', 'telepon', 'ppl', 'alamat', 'link', 'luas_lahan', 'status', 'kwt_kelurahan_id','kwt_kecamatan_id'
    ];

    public function kwtKelurahan()
    {
    	return $this->belongsTo(KwtKelurahan::class);
    }
    
    public function kwtKecamatan()
    {
    	return $this->belongsTo(KwtKecamatan::class);
    }

    public function anggota()
    {
    	return $this->hasMany(KwtAnggota::class);
    }
    
    public function dataPanganLokal()
    {
        return $this->hasMany(DataPanganLokal::class);
    }
    
    public function komoditi()
    {
        return $this->hasMany(KwtKomoditi::class);
    }
    
    public function kwtProposal()
    {
        return $this->hasMany(KwtProposal::class);
    }
}
