<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwtManfaat extends Model
{
    use HasFactory;

    protected $table = 'kwt_manfaat';
    protected $fillable = [
    	'kwt_kelompok_id', 'tanggal'
    ];

    public function kwtKelompok()
    {
    	return $this->belongsTo(KwtKelompok::class);
    }
    
    public function kwtManfaatBantuan()
    {
        return $this->hasMany(KwtManfaatBantuan::class);
    }
}
