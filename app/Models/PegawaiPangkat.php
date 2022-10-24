<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPangkat extends Model
{
    use HasFactory;

    protected $table = 'pegawai_pangkat';
    protected $fillable = [
        'nama_pangkat', 'no_sk', 'tgl_sk', 'tmt_pangkat', 'foto', 'pegawai_id'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}