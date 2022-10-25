<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = [
        'nip',
        'nama',
        'jk',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'no_hp',
        'email',
        'foto_diri',
        'kk',
        'ktp',
        'akte',
        'npwp',
        'bpjs',
    ];

    public function pegawaiPangkat()
    {
        return $this->hasMany(PegawaiPangkat::class);
    }

    public function pegawaiJabatan()
    {
        return $this->hasMany(PegawaiJabatan::class);
    }

    public function pendidikanUmum()
    {
        return $this->hasMany(PegawaiPendidikanUmum::class);
    }

    public function pelatihanKepemimpinan()
    {
        return $this->hasMany(PegawaiPelatihanKepemimpinan::class);
    }

    public function pelatihanteknis()
    {
        return $this->hasMany(PelatihanTeknis::class);
    }

    public function organisasi()
    {
        return $this->hasMany(Organisasi::class);
    }

    public function penghargaan()
    {
        return $this->hasMany(Penghargaan::class);
    }

    public function pasangan()
    {
        return $this->hasMany(Pasangan::class);
    }

    public function anak()
    {
        return $this->hasMany(Anak::class);
    }

    public function ortu()
    {
        return $this->hasMany(Ortu::class);
    }

    public function image()
    {
        return $this->hasMany(PegawaiImage::class);
    }

    public function pegawaiGaji()
    {
        return $this->hasMany(PegawaiGaji::class);
    }

    public function assetUmum()
    {
        return $this->belongsToMany(AssetUmum::class);
    }
}