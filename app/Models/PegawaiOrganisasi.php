<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiOrganisasi extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'pegawai_organisasi';

    protected $fillable = [
        'nama_organisasi', 'kedudukan', 'tempat', 'nama_pimpinan', 'foto', 'pegawai_id'
    ];
}