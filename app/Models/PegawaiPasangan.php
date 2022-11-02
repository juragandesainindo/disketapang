<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPasangan extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'pegawai_pasangan';
    protected $fillable = [
        'nama_pasangan', 'tempat_lahir', 'tgl_lahir', 'tgl_nikah', 'pekerjaan', 'foto', 'pegawai_id'
    ];
}