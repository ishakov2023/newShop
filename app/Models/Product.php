<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
        [
            'name',
            'description',
            'price',
            'amount',
            'category_id',
        ];
    protected $casts =
        [
            'price' => 'integer',
            'amount' => 'integer',

        ];
}