<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KwtBeritaBantuan extends Model
{
    use HasFactory;

    protected $table = 'kwt_berita_bantuan';
    protected $fillable = [
    	'jenis_barang','jumlah','satuan','keterangan','kwt_berita_id'
    ];
    
    public function kwtBerita()
    {
        return $this->belongsTo(KwtBerita::class);
    }
}
