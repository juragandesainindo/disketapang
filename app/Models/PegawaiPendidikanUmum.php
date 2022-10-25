<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPendidikanUmum extends Model
{
    use HasFactory;

    protected $table = 'pegawai_pendidikan_umum';

    protected $fillable = [
        'jenjang_pendidikan', 'jurusan', 'nama_sekolah', 'tahun_lulus', 'foto', 'pegawai_id'
    ];
}