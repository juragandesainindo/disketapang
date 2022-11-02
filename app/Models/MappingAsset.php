<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingAsset extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'mapping_asset';
    protected $guarded = [];
}