<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pangkat extends Model
{
    use HasFactory;
    protected $table = 'pangkat';
    protected $fillable = [
    	'nama_pangkat','no_sk','tgl_sk','tmt_pangkat','foto','pegawai_id'
    ];
    protected $dates =['tgl_sk','tmt_pangkat'];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
    
    public function pegawaiGaji()
    {
    	return $this->hasMany(PegawaiGaji::class);
    }
}
