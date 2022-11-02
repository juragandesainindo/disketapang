<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiAnak extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';

    protected $table = 'pegawai_anak';
    protected $fillable = [
        'nama_anak', 'tempat_lahir', 'tgl_lahir', 'status_anak', 'pekerjaan', 'foto', 'pegawai_id'
    ];
}