<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ordered_product;
use App\Models\Adress;
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
        'order_products',"adress"
    ];
    public function order_products()
    {
        return  $this->hasMany(Ordered_product::class, 'orders_id', 'id');
    }

    public function adress()
    {
        return  $this->hasOne(Adress::class, 'id' ,'adress_id' );
    }
}
