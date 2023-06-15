<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Token extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'id',
        'user_token_id',
        'api_token',
        'del'
    ];
    protected $with = [
        'user'
    ];
    public function user()
    {
        return  $this->hasOne(User::class, 'id', 'user_token_id');
    }
}
