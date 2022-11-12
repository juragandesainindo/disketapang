<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddMoreInput extends Model
{
    use HasFactory;
    public $table = "product_stock";

    public $fillable = ['name', 'qty', 'price'];
}