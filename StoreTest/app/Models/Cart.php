<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{


    use HasFactory;
    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'post_id',
        'user_id',
        'quantity'
        ];

}
