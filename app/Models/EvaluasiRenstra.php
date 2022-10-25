<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiRenstra extends Model
{
    use HasFactory;

    protected $table = 'evaluasi_renstra';

    protected $fillable = [
        'indikator', 'target', 'realisasi', 'rasio', 'tahun'
    ];
}