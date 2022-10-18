<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitDistributor extends Model
{
    use HasFactory;

    protected $table = 'unit_distributor';

    protected $fillable = ['nama_perusahaan', 'bentuk_usaha', 'alamat','link','telepon','komoditi','gambar'];
}
