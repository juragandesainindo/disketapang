<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class CadanganPangan extends Model
{
    use HasFactory;

    protected $table = 'cadangan_pangan';
    protected $fillable = ['pedagang','alamat','link'];

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
}
