<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;
class Order extends Model
{

    protected $fillable =
        [
            'basket_product_id',
            'user_id',
        ];
    public function basketProduct()
    {
        return $this->belongsTo(BasketProduct::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
