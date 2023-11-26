<?php

namespace App\Repositories\UpdateBasket;

use App\Contracts\Repositories\UpdateBasketContract;
use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryRawUpdateBasket implements UpdateBasketContract
{
    public function updateBasketIsButton(Request $request,$productId,$userId){
        if ($request->input('plus') && ($request->count < $request->amount)){
            return DB::update('Update baskets Set count = count + 1 where product_id = :productId and user_id = :userId',[$productId,$userId]);
        }elseif ($request->input('minus') && ($request->count > 0)){
             return DB::update('Update baskets Set count = count - 1 where product_id = :productId and user_id = :userId',[$productId,$userId]);
        }
    }
}
