<?php

namespace App\Repositories\Basket;

use App\Contracts\Repositories\BasketRepositoryCRUDContract;
use App\Models\Basket;
use App\Models\BasketProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasketRawRepositoryCRUD implements BasketRepositoryCRUDContract
{
    public function getByUser($userId){

        return Basket::select("SELECT * FROM baskets  JOIN products  ON baskets.product_id= products.id WHERE baskets.user_id= $userId")->get();

    }
    public function createBasket($productId, $userId)
    {
        $bask = DB::select("select * from baskets where user_id = $userId");
        $bask = collect([$bask]);
        if (!$bask) {
            DB::insert("insert into baskets (user_id) values  $userId");
        }
        $baskProduct = DB::select("select * from basket_products where product_id = $productId");
        $baskProduct = collect([$baskProduct]);

        if ($baskProduct->isEmpty()) {
            $bask->product()->attach($productId, ['count' => 1]);
        }
    }
    public function updateBasketPlus( Request $request,$productId, $basketId)
    {

//        return BasketProduct::query()->where(['product_id' => $productId, 'basket_id' => $basketId])->increment('count', '1');
        return DB::update("update basket_products set count = count + 1 where product_id = $productId and basket_id = $basketId");
    }

    public function updateBasketMinus(Request $request, $productId, $basketId)
    {
        return DB::update("update basket_products set count = count - 1 where product_id = $productId and basket_id = $basketId");
    }
    public function basketDestroy(Request $request,$id,$basketId){
//        return BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$id])->forceDelete();
        return DB::delete("delete from basket_products where basket_id = $basketId and product_id =$id");
    }

}
