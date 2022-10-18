<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwtKelurahan extends Model
{
    use HasFactory;

    protected $table = 'kwt_kelurahan';
    protected $fillable = ['kelurahan','kwt_kecamatan_id'];

    public function kwtKecamatan()
    {
    	return $this->belongsTo(KwtKecamatan::class);
    }

    public function kelompok()
    {
    	return $this->hasMany(KwtKelompok::class);
    }
}
