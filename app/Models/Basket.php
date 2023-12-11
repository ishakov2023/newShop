<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable =
        [
            'user_id',
        ];
    protected $casts =
        [
            'total_sum' => 'integer',
        ];
    public function product()
    {
        return $this->belongsToMany(Product::class,'basket_products')->withPivot('count','deleted_at');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
