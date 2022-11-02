<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PegawaiGaji extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'pegawai_gaji';
    protected $fillable = [
        'pangkat_id', 'jabatan', 'tmt_kgb', 'gaji_pokok', 'masa_kerja', 'file', 'pegawai_id'
    ];
    protected $dates = ['tmt_kgb'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }
}