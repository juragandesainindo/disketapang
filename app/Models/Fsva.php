<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Fsva extends Model
{
    use HasFactory;

    protected $table = 'fsva';
    protected $fillable = [
    	'keterangan','tanggal','excel'
    ];

    public function fsvapeta()
    {
    	return $this->hasMany(FsvaPeta::class);
    }
}
