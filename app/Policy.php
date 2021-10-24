<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'signature', 'date' , 'order_id'
    ];

    protected $table = 'policies';
}
