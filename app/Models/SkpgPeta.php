<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SkpgPeta extends Model
{
    use HasFactory;

    protected $table = 'skpg_peta';
    protected $fillable = [
    	'peta','keterangan','skpg_id'
    ];

    public function skpg()
    {
    	return $this->belongsTo(Skpg::class);
    }
}
