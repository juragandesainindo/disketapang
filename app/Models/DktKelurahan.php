<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DktKelurahan extends Model
{
    use HasFactory;

    protected $table = 'dkt_kelurahan';
    protected $fillable = [
    	'kelurahan','dkt_kecamatan_id'
    ];

    public function dktKecamatan()
    {
    	return $this->belongsTo(DktKecamatan::class);
    }

    public function dktKelompok()
    {
    	return $this->hasMany(DktKelompok::class);
    }
}
