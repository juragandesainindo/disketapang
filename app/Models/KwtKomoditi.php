<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwtKomoditi extends Model
{
    use HasFactory;

    protected $table = 'kwt_komoditi';
    protected $fillable = [
    	'komoditi', 'produksi', 'kwt_kelompok_id'
    ];

    public function kelompok()
    {
    	return $this->belongsTo(KwtKelompok::class);
    }
}
