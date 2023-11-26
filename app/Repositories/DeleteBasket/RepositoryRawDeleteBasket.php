<?php

namespace App\Repositories\DeleteBasket;

use App\Contracts\Repositories\DeleteBasketContract;
use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryRawDeleteBasket implements DeleteBasketContract
{
        public function basketDestroy(Request $request,$id,$userId){
            if ($request->input('delete')){
                return DB::delete('Delete baskets from baskets where product_id =:id and user_id =:userId ',[$id,$userId]);
            }
        }
}
