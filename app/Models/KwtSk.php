<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KwtSk extends Model
{
    use HasFactory;

    protected $table = 'kwt_sk';
    protected $fillable = [
    	'keterangan','file','tanggal'
    ];
}
