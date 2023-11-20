<?php

namespace App\Repositories;

use App\Models\Basket;
use Illuminate\Http\Request;

class RepositoryUpdateBasket
{
    public function updateBasket(Request $request,$productId,$userId){
        if ($request->input('plus') && ($request->count <= $request->amount)){
           return Basket::query()->where(['product_id'=>$productId,'user_id'=>$userId])->increment('count','1');
        }elseif ($request->input('minus') && ($request->count > 0)){
           return Basket::query()->where(['product_id'=>$productId,'user_id'=>$userId])->decrement('count','1');
        }
    }
}
