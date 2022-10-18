<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Sk extends Model
{
    use HasFactory;

    protected $table = 'kamapan_sk';
    protected $fillable = [
        'keterangan', 'tanggal', 'file'
    ];

    public function beritaAcara()
    {
        return $this->hasMany(BeritaAcara::class);
    }
}