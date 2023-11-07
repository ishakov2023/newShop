<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable =
        [
            'product_id',
            'user_id',
            'count',
        ];
    protected $casts =
        [
            'count' => 'integer',

        ];
}
