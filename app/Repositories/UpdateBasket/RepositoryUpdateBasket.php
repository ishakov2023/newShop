<?php

namespace App\Repositories\UpdateBasket;

use App\Contracts\Repositories\UpdateBasketContract;
use App\Models\Basket;
use Illuminate\Http\Request;

class RepositoryUpdateBasket implements UpdateBasketContract
{
    public function updateBasketIsButton(Request $request,$productId,$userId){
        if ($request->input('plus') && ($request->count < $request->amount)){
           return Basket::query()->where(['product_id'=>$productId,'user_id'=>$userId])->increment('count','1');
        }elseif ($request->input('minus') && ($request->count > 0)){
           return Basket::query()->where(['product_id'=>$productId,'user_id'=>$userId])->decrement('count','1');
        }
    }
}
