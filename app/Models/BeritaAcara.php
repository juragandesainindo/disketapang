<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;

    protected $table = 'kamapan_ba';
    protected $fillable = [
        'kamapan_sk_id', 'file'
    ];
    // protected $guarded = [];

    public function kamapanSk()
    {
        return $this->belongsTo(Sk::class);
    }

    public function beritaAcaraShow()
    {
        return $this->hasMany(BeritaAcaraShow::class);
    }
}