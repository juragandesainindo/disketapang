<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPelatihanTeknis extends Model
{
    use HasFactory;

    protected $table = 'pegawai_pelatihan_teknis';

    protected $fillable = [
        'nama_diklat', 'angkatan', 'tahun', 'tempat', 'panitia', 'foto', 'pegawai_id'
    ];
}