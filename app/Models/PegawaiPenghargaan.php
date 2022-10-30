<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPenghargaan extends Model
{
    use HasFactory;

    protected $table = 'pegawai_penghargaan';
    protected $fillable = ['penghargaan', 'tahun', 'asal_perolehan', 'foto', 'pegawai_id'];
}