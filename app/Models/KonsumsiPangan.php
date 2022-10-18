<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsumsiPangan extends Model
{
    use HasFactory;

    protected $table = 'konsumsi_pangan';
    protected $fillable = [
    	'kwt_kecamatan_id','skor_pph'
    ];
    
    public function kwtKecamatan()
    {
        return $this->belongsTo(KwtKecamatan::class);
    }

}
