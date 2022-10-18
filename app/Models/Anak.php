<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'pegawai_anak';
    protected $fillable = [
    	'nama_anak','tempat_lahir','tgl_lahir','status_anak','pekerjaan','foto','pegawai_id'
    ];
    protected $dates=['tgl_lahir'];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
}
