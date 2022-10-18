<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Skpg extends Model
{
    use HasFactory;

    protected $table = 'skpg';
    protected $fillable = [
    	'keterangan','date','excel'
    ];
    protected $dates=['date'];

    public function skpgpeta()
    {
    	return $this->hasMany(SkpgPeta::class);
    }
}
