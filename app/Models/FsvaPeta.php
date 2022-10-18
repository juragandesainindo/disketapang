<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class FsvaPeta extends Model
{
    use HasFactory;

    protected $table = 'fsva_peta';
    protected $fillable = [
    	'peta','fsva_id','ket'
    ];

    public function fsva()
    {
    	return $this->belongsTo(Fsva::class);
    }
}
