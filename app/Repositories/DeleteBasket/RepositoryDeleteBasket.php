<?php

namespace App\Repositories\DeleteBasket;

use App\Contracts\Repositories\DeleteBasketContract;
use App\Models\Basket;
use Illuminate\Http\Request;

class RepositoryDeleteBasket implements DeleteBasketContract
{
        public function basketDestroy(Request $request,$id,$userId){
            if ($request->input('delete')){
               return Basket::query()->where(['product_id'=>$id,'user_id'=>$userId])->delete();
            }
        }
}
