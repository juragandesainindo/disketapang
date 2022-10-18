<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadanganBulog extends Model
{
    use HasFactory;

    protected $table = 'cadangan_bulog';
    protected $fillable = [
    	'pengadaan','stok','tgl_stok','belanja','tgl_belanja','keterangan','satuan'
    	
    ];
}
