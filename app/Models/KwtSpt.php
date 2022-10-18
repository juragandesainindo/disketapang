<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KwtSpt extends Model
{
    use HasFactory;

    protected $table = 'kwt_spt';
    protected $fillable = [
    	'keterangan','file'
    ];
}
