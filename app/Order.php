<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'zipcode', 'style' , 'order_session' , 'fullname', 'address', 'phone', 'price', 'email'
    ];
}

