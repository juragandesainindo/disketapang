<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DktKecamatan extends Model
{
    use HasFactory;

    protected $table = 'dkt_kecamatan';
    protected $fillable = ['kecamatan'];

    public function dktKelurahan()
    {
    	return $this->hasMany(DktKelurahan::class);
    }
    
    public function dktKelompok()
    {
        return $this->hasMany(DktKelompok::class);
    }
}
