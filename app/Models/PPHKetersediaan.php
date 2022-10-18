<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PPHKetersediaan extends Model
{
    use HasFactory;

    protected $table = 'pph_ketersediaan';
    protected $fillable = [
    	'bahan_makanan','energi','skor_pph','tahun'
    ];
}
