<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BeritaAcaraShow extends Model
{
    use HasFactory;

    protected $table = 'kamapan_baShow';
    protected $fillable = [
    	'jenis_barang','jumlah','satuan','keterangan','berita_acara_id'
    ];
    
    public function beritaAcara()
    {
        return $this->belongsTo(BeritaAcara::class);
    }
}
