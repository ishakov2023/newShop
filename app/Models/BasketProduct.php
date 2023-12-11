<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasketProduct extends Model
{
    use SoftDeletes;
    protected $fillable =
        [

            'basket_id',
            'product_id',
            'count',
            'deleted_at',
        ];
    protected $casts =
        [
            'count' => 'integer',
        ];
    protected $dates = ['deleted_at'];

    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
