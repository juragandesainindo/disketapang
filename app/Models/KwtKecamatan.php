<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwtKecamatan extends Model
{
    use HasFactory;

    protected $table = 'kwt_kecamatan';
    protected $fillable = ['kecamatan'];

    public function kelurahan()
    {
    	return $this->hasMany(KwtKelurahan::class);
    }
    
    public function konsumsiPangan()
    {
        return $this->hasMany(KonsumsiPangan::class);
    }
    
    public function kelompok()
    {
        return $this->hasMany(KwtKelompok::class);
    }
}
