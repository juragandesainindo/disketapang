<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasarLembaga extends Model
{
    use HasFactory;

    protected $table = 'pasar_lembaga';
    protected $fillable = ['nama_lembaga'];

    public function pasar_jenis()
    {
    	return $this->hasMany(PasarJenis::class);
    }
}
