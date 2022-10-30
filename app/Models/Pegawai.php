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

    public function pelatihanTeknis()
    {
        return $this->hasMany(PegawaiPelatihanTeknis::class);
    }

    public function pegawaiOrganisasi()
    {
        return $this->hasMany(PegawaiOrganisasi::class);
    }

    public function pegawaiPenghargaan()
    {
        return $this->hasMany(PegawaiPenghargaan::class);
    }

    public function pegawaiPasangan()
    {
        return $this->hasMany(PegawaiPasangan::class);
    }

    public function pegawaiAnak()
    {
        return $this->hasMany(PegawaiAnak::class);
    }

    public function pegawaiOrtu()
    {
        return $this->hasMany(PegawaiOrtu::class);
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