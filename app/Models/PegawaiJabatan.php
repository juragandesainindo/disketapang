<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiJabatan extends Model
{
    use HasFactory;

    protected $table = 'pegawai_jabatan';
    protected $fillable = [
        'nama_jabatan', 'eselon', 'tmt_jabatan', 'akhir_jabatan', 'foto', 'pegawai_id'
    ];
}