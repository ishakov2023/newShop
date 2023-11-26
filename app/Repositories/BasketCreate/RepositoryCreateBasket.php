<?php

namespace App\Repositories\BasketCreate;

use App\Contracts\Repositories\BasketCreateContract;
use App\Models\Basket;

class RepositoryCreateBasket implements BasketCreateContract
{
    public function selectBasket($productId,$userId){
        $bask = Basket::query()->where(['product_id'=>$productId,'user_id'=>$userId])->get();
        if (($bask)->isEmpty()){
            return Basket::query()->create([
                'product_id' => $productId,
                'user_id' => $userId,
                'count' => '1',
            ]);
        }
    }
}
