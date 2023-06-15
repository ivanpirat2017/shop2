<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordered_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'categories_id',
        'orders_id',
        'status',
        'delivery',
        'creating_product',
        'count',
        'price',
    ];
}
