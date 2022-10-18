<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpa extends Model
{
    use HasFactory;

    protected $table = 'dpa';
    // protected $fillable = ['title','file'];
    protected $guarded = [];
}