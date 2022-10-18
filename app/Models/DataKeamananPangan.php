<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeamananPangan extends Model
{
    use HasFactory;
    protected $table = 'data_keamanan_pangan';
    protected $fillable = ['title','file'];
}
