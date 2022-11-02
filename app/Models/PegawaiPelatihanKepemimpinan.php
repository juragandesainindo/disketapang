<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPelatihanKepemimpinan extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'pegawai_pelatihan_kepemimpinan';

    protected $fillable = [
        'nama_diklat', 'angkatan', 'tahun', 'tempat', 'panitia', 'foto', 'pegawai_id'
    ];
}