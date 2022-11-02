<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaJabatan extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'peta_jabatan';
    protected $fillable = [
        'title', 'file'
    ];
}