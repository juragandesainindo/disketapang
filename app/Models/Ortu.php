<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    protected $table = 'pegawai_ortu';
    protected $fillable = [
    	'nama_ortu','tempat_lahir','tgl_lahir','status_ortu','pekerjaan','foto','pegawai_id'
    ];
    protected $dates = ['tgl_lahir'];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
}
