<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProductController;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];
}
