<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KamapanSkTahun extends Model
{
    use HasFactory;

    protected $table = 'kamapan_sk_penerima_tahun';
    protected $fillable = [
    	'tahun'
    ];
    
    public function kamapanSkShow()
    {
        return $this->hasMany(KamapanSkShow::class);
    }
}
