<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamapanDaftarBantuan extends Model
{
    use HasFactory;

    protected $table = 'kamapan_daftar_bantuan';
    protected $fillable = [
    	'jenis_barang','jumlah','satuan','keterangan','kamapan_daftar_id'
    ];

    public function kamapanDaftar()
    {
    	return $this->belongsTo(KamapanDaftar::class);
    }
}
