<?php

namespace App\Repositories\BasketCreate;

use App\Contracts\Repositories\BasketCreateContract;
use App\Models\Basket;
use App\Models\Product;

class RepositoryCreateBasket implements BasketCreateContract
{
    public function selectBasket($productId,$userId){
        $bask = Basket::query()->where(['product_id'=>$productId,'user_id'=>$userId])->get();
        $product = Product::query()->where(['id'=>$productId])->get();
        $products = null;
        foreach ($product as $value){
            $products=$value->amount;
        }
        if (($bask)->isEmpty() && ($products > 0)){
            return Basket::query()->create([
                'product_id' => $productId,
                'user_id' => $userId,
                'count' => '1',
            ]);
        }
    }
}
