<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renstra extends Model
{
    use HasFactory;

    protected $table = 'renstra';

    protected $fillable = [
    	'indikator','target','realisasi','rasio','tahun'
    ];
}
