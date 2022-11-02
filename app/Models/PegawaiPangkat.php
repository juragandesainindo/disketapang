<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPangkat extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'pegawai_pangkat';
    protected $fillable = [
        'nama_pangkat', 'no_sk', 'tgl_sk', 'tmt_pangkat', 'foto', 'pegawai_id'
    ];
}