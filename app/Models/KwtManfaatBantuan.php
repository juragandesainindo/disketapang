<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwtManfaatBantuan extends Model
{
    use HasFactory;

    protected $table = 'kwt_manfaat_bantuan';
    protected $fillable = [
    	'jenis_barang', 'jumlah','satuan','keterangan','kwt_manfaat_id'
    ];

    public function kwtmanfaat()
    {
    	return $this->belongsTo(KwtManfaat::class);
    }
}
