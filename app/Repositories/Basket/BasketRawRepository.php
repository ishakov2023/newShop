<?php

namespace App\Repositories\Basket;

use App\Contracts\Repositories\BasketRepositoryContract;
use App\Models\Basket;
use Illuminate\Support\Facades\DB;

class BasketRawRepository implements BasketRepositoryContract
{
    public function basket($userId){

        return DB::select('SELECT * FROM `baskets` JOIN `products` ON `baskets`.product_id= `products`.`id` WHERE `baskets`.`user_id`= ?',[$userId]);

//        return Basket::query()->where('user_id', $userId)
//            ->join('products', 'baskets.product_id', '=', 'products.id')
//            ->get();
    }
}
