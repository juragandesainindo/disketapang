<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasarJenis extends Model
{
    use HasFactory;

    protected $table = 'pasar_jenis';
    protected $fillable = ['nama_pasar','alamat','link','kecamatan','foto','pasar_lembaga_id'];

    public function pasar_lembaga()
    {
    	return $this->belongsTo(PasarLembaga::class);
    }
}
