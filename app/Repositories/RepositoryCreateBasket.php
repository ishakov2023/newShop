<?php

namespace App\Repositories;

use App\Models\Basket;
use Illuminate\Http\Request;

class RepositoryCreateBasket
{
    public function creatBasket($productId,$userId){
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
