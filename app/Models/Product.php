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
        return $this->belongsToMany(Basket::class,'basket_products')->withPivot('count','deleted_at');
    }
}
