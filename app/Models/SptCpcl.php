<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SptCpcl extends Model
{
    use HasFactory;

    protected $table = 'spt_cpcl';
    protected $fillable = [
    	'title','file'
    ];
}
