<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
        [
            'id',
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

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }
}
