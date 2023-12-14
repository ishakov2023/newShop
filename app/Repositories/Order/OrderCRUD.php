<?php

namespace App\Repositories\Order;

use App\Contracts\Repositories\OrderCRUDContract;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\Product;
use App\Serves\ServiceCRUDBasket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Collection;


class OrderCRUD implements OrderCRUDContract
{
    /**
     * Добавление покупки из корзины
     *
     * @param $basketProducts collection
     * @var int $userId
     */
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

    /**
     * Создание покупки если продукта меньше чем в корзине
     *
     * @param $basketId
     * @param $productId
     * @param $productAmount
     * @param $userId
     * @param ServiceCRUDBasket $serviceBasket function
     */
    public function createOrderWithUpdateBasketAmount($basketId, $productId , $productAmount, $userId, ServiceCRUDBasket $serviceBasket)
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
    /**
     * Создание покупки
     *
     * @param $basketId
     * @param $productId
     * @param $userId
     * @param ServiceCRUDBasket $serviceBasket function
     */
    public function createOrderMissingProductPage($basketId, $productId , $userId, ServiceCRUDBasket $serviceBasket)
    {

        $getBasket = BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$productId])->first();
        if (!is_null($getBasket)){
        Order::query()->create([
            'user_id' => $userId,
            'basket_product_id' => $getBasket->id,
        ]);
        }
    }
    /**
     * Удаление корзин при отмене покупки из страницы недостоющего продукта
     *
     * @param $basketWithProduct model
     */
    public function destroyOrder($basketWithProduct)
    {
        foreach ($basketWithProduct->product as $product){
            BasketProduct::query()->where(['basket_id'=>$product->pivot->basket_id,'product_id'=>$product->pivot->product_id,'deleted_at'=>null])->forceDelete();
        }
    }
}
