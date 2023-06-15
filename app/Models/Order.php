<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ordered_product;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'description',
        'adress_id',
    ];
    protected $with = [
        'order_products'
    ];
    public function order_products()
    {
        return  $this->hasMany(Ordered_product::class, 'orders_id', 'id');
    }
}
