<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'message',
        'dell',
        'selection'
    ];
    protected $with = [ 'user' ];

    public function user()
    {
        return  $this->hasOne(User::class, 'id', 'user_id');
    }
    function dell()
    {
        $this->dell = true;
        $this->selection = false;
        $this->save();
    }
    function push()
    {
        $this->dell = false;
        $this->selection = true;
        $this->save();
    }
}
