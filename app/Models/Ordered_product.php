<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Ordered_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'orders_id',
        'status',
        'delivery',
        'creating_product',
        'price',
    ];
    protected $with = [
        'product'
    ];
    public function product()
    {
        return  $this->hasOne(Product::class, 'id', 'product_id');
    }

}
