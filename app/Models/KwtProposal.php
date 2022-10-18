<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KwtProposal extends Model
{
    use HasFactory;

    protected $table = 'kwt_proposal';
    protected $fillable = [
    	'keterangan','file','kwt_kelompok_id'
    ];

    public function kwtKelompok()
    {
    	return $this->belongsTo(KwtKelompok::class);
    }
    
    public function kwtVerifikasi()
    {
    	return $this->hasMany(KwtVerifikasi::class);
    }
}
