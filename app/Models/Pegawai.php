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
    	'nip','nama','npwp','jk','tempat_lahir','tgl_lahir','agama','alamat','bpjs','telepon','email','foto'
    ];
    protected $dates =['tgl_lahir'];

    public function pangkat()
    {
    	return $this->hasMany(Pangkat::class);
    }

    public function jabatan()
    {
    	return $this->hasMany(Jabatan::class);
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function pelatihankepemimpinan()
    {
        return $this->hasMany(PelatihanKepemimpinan::class);
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
}
