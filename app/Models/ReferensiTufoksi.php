<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferensiTufoksi extends Model
{
    use HasFactory;

    protected $table = 'referensi_tufoksi';
    protected $fillable = [
    	'nomor_peraturan','uraian','tanggal','file'
    ];
}
