<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KwtBerita extends Model
{
    use HasFactory;

    protected $table = 'kwt_berita';
    protected $fillable = [
    	'pendahuluan','kesimpulan','tanggal','kwt_kelompok_id'
    ];
    protected $dates = ['tanggal'];
    
    public function kwtKelompok()
    {
        return $this->belongsTo(KwtKelompok::class);
    }
    
    public function kwtBeritaBantuan()
    {
        return $this->hasMany(KwtBeritaBantuan::class);
    }
}
