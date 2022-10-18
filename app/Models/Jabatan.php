<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $fillable = [
    	'nama_jabatan','eselon','tmt_jabatan','akhir_jabatan','foto','pegawai_id'
    ];
    protected $dates=['tmt_jabatan','akhir_jabatan'];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
    
    public function pegawaiGaji()
    {
    	return $this->hasMany(PegawaiGaji::class);
    }
}
