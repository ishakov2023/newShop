<?php

namespace App\Repositories;

use App\Models\Basket;
use Illuminate\Http\Request;

class RepositoryDeleteBasket
{
        public function delete(Request $request,$id,$userId){
            if ($request->input('delete')){
               return Basket::query()->where(['product_id'=>$id,'user_id'=>$userId])->delete();
            }
        }
}
