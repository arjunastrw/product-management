<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $product = 'products';
    protected $fillable = ['name_product', 'brand', 'stock', 'user_id'];
}