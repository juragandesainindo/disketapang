<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiOrtu extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'pegawai_ortu';
    protected $fillable = [
        'nama_ortu', 'tempat_lahir', 'tgl_lahir', 'status', 'pekerjaan', 'foto', 'pegawai_id'
    ];
}