<?php

namespace App\Repositories\Basket;

use App\Contracts\Repositories\BasketRepositoryCRUDContract;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Collection;

class RepositoryCRUDBasket implements BasketRepositoryCRUDContract
{
    /**
     * Получение коллекции продуктов в корзине
     *
     * @var int $userId
     */
    public function getByUser($userId)
    {
        return Basket::query()
            ->where('user_id', $userId)
            ->with(
                'product')
            ->first();
    }
    /**
     * Получение корзины
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getBasketProduct(){
        return BasketProduct::query()->get();
    }
    /**
     * Создание корзины и корзины продуктов
     *
     * @var int $userId
     * @var int $productId
     */
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

    /**
     * Измение продукта в корзине на увелечение
     *
     * @param Request $request
     * @var int $productId
     * @var int $basketId
     */
    public function updateBasketPlus( Request $request,$productId, $basketId)
    {

        BasketProduct::query()->where(['product_id' => $productId, 'basket_id' => $basketId])->increment('count', '1');
    }
    /**
     * Измение продукта в корзине на уменьшение
     *
     * @param Request $request
     * @var int $productId
     * @var int $basketId
     */
    public function updateBasketMinus(Request $request, $productId, $basketId)
    {
        BasketProduct::query()->where(['product_id' => $productId, 'basket_id' => $basketId])->decrement('count', '1');
    }
    /**
     * Полное удаление корзины с продуктом
     *
     * @param Request $request
     * @var int $id
     * @var int $basketId
     */
    public function basketDestroy(Request $request,$id,$basketId){
        BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$id,'deleted_at'=>null])->forceDelete();
    }
    /**
     * Мягкое удаление корзины с продуктом
     *
     * @var int $id
     * @var int $basketId
     */
    public function basketDelete($basketId,$id){
        BasketProduct::query()->where(['basket_id'=>$basketId,'product_id'=>$id])->delete();
    }
}
