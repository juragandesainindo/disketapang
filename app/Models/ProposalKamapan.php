<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ProposalKamapan extends Model
{
    use HasFactory;

    protected $table = 'proposal_kamapan';
    protected $fillable = [
    	'keterangan','file','dkt_kelompok_id'
    ];

    public function dktKelompok()
    {
    	return $this->belongsTo(DktKelompok::class);
    }
}
