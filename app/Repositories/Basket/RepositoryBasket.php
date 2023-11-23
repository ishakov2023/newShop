<?php

namespace App\Repositories\Basket;

use App\Contracts\Repositories\BasketRepositoryContract;
use App\Models\Basket;

class RepositoryBasket implements BasketRepositoryContract
{
        public function basket($userId){
            return Basket::query()->where('user_id', $userId)
                ->join('products', 'baskets.product_id', '=', 'products.id')
                ->get();
        }
}