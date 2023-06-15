<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_img;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'price',
        'products_id',
        'tags',
        'count',
        'name',
        'description',
        'reting',
        'categories_id',
    ];
    protected $with = [
        'imgs'
    ];
    public function imgs()
    {
        return  $this->hasMany(Product_img::class, 'products_id', 'id');
    }

}
