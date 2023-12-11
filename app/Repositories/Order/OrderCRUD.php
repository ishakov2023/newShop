<?php

namespace App\Repositories\Order;

use App\Contracts\Repositories\OrderCRUDContract;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\Product;
use App\Serves\ServiceCRUDBasket;
use Illuminate\Support\Facades\DB;


class OrderCRUD implements OrderCRUDContract
{
    public function createOrder($basketProducts, $userId)
    {
        DB::transaction(function () use ($basketProducts, $userId) {
            foreach ($basketProducts as $basket) {
                Order::query()->create([
                    'user_id' => $userId,
                    'basket_product_id' => $basket->id
                ]);
            }
        });
    }

    public function updateOrderWithAmount($basketId,$productId ,$productAmount,$userId,ServiceCRUDBasket $serviceBasket)
    {
        $getBasket = BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$productId,'deleted_at'=>null])->first();
        BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$productId,'deleted_at'=>null])->update(['count'=>$productAmount]);
        if (!is_null($getBasket)){
            Order::query()->create([
                'user_id' => $userId,
                'basket_product_id' => $getBasket->id,
            ]);
        }
    }
    public function updateOrder($basketId,$productId ,$userId,ServiceCRUDBasket $serviceBasket)
    {

        $getBasket = BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$productId])->first();
        if (!is_null($getBasket)){
        Order::query()->create([
            'user_id' => $userId,
            'basket_product_id' => $getBasket->id,
        ]);
        }
    }

    public function destroyOrder($products)
    {
        foreach ($products->product as $product){
            BasketProduct::query()->where(['basket_id'=>$product->pivot->basket_id,'product_id'=>$product->pivot->product_id])->forceDelete();
        }
    }
}
