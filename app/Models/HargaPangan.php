<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaPangan extends Model
{
    use HasFactory;

    protected $table = 'harga_pangan';
    protected $guarded = [];

    // protected $dates=['tanggal'];
}