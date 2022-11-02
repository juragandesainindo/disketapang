<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'sop';
    protected $fillable = ['title', 'file'];
}