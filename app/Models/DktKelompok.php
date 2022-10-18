<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DktKelompok extends Model
{
    use HasFactory;

    protected $table = 'dkt_kelompok';
    protected $fillable = [
    	'nama_dkt','dkt_kelurahan_id','dkt_kecamatan_id','alamat','link','ketua','telepon','ppl','status'
    ];

    public function dktKelurahan()
    {
    	return $this->belongsTo(DktKelurahan::class);
    }

    public function anggota()
    {
    	return $this->hasMany(DktAnggota::class);
    }

    public function proposal()
    {
        return $this->hasMany(ProposalKamapan::class);
    }
    
    public function verifikasiCpclKamapan()
    {
        return $this->hasMany(VerifikasiCPCLKamapan::class);
    }
    
    public function pengusulSertifikasi()
    {
        return $this->hasMany(PengusulSertifikasi::class);
    }
    
    public function dktKecamatan()
    {
        return $this->belongsTo(DktKecamatan::class);
    }
    
    public function skShow()
    {
        return $this->hasMany(SkShow::class);
    }
    
    public function beritaAcara()
    {
        return $this->hasMany(BeritaAcara::class);
    }
    
    public function kamapanDaftar()
    {
        return $this->hasMany(KamapanDaftar::class);
    }
}
