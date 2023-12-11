<?php

namespace App\Repositories\Basket;

use App\Contracts\Repositories\BasketRepositoryCRUDContract;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryCRUDBasket implements BasketRepositoryCRUDContract
{
    public function getByUser($userId)
    {
        return Basket::query()
            ->where('user_id', $userId)
            ->with(
                'product')
            ->first();
    }
    public function getBasketProduct(){
        return BasketProduct::query()->get();
    }
    public function createBasket($productId, $userId)
    {
        $bask = Basket::query()->where('user_id', $userId)->first();
        if (!$bask) {
            Basket::query()->create([
                'user_id' => $userId,
            ])->save();
        }
        $baskProduct = BasketProduct::query()->where(['product_id'=>$productId,'basket_id'=>$bask->id])->get();
        if ($baskProduct->isEmpty()) {
            $bask->product()->attach($productId, ['count' => 1]);
        }
    }
    public function updateBasketPlus( Request $request,$productId, $basketId)
    {

        return BasketProduct::query()->where(['product_id' => $productId, 'basket_id' => $basketId])->increment('count', '1');
    }

    public function updateBasketMinus(Request $request, $productId, $basketId)
    {
        return BasketProduct::query()->where(['product_id' => $productId, 'basket_id' => $basketId])->decrement('count', '1');
    }
    public function basketDestroy(Request $request,$id,$basketId){
        return BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$id])->forceDelete();
    }
    public function basketDelete($basketId,$id){
        return BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$id])->delete();
    }
}
