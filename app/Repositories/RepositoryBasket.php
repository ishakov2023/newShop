<?php

namespace App\Repositories;

use App\Models\Basket;
use App\Models\Product;

class RepositoryBasket
{
        public function basket($userId){
            return Basket::query()->where('user_id', $userId)
                ->join('products', 'baskets.product_id', '=', 'products.id')
                ->get();
        }
}
