<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CPCLKTKamapan extends Model
{
    use HasFactory;

    protected $table = 'cpcl_kt_kamapan';
    protected $fillable = [
    	'maksud','tujuan','waktu_survey','hasil_survey'
    ];
}
