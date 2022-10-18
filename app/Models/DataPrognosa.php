<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DataPrognosa extends Model
{
    use HasFactory;

    protected $table = 'data_prognosa';
    protected $fillable = [
    	'title','file'
    ];
}
