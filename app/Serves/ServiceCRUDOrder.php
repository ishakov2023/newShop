<?php

namespace App\Serves;

use App\Contracts\Repositories\OrderCRUDContract;
use App\Models\BasketProduct;
use App\Models\Order;

class ServiceCRUDOrder
{
    private $repositoryCRUDOrder;

    public function __construct(OrderCRUDContract $CRUDContract)
    {
        $this->repositoryCRUDOrder = $CRUDContract;
    }
    /**
     * Создание покупки
     *
     * @param $basketProducts
     * @var int $userId
     */
    public function createOrder($basketProducts, int $userId)
    {
        $this->repositoryCRUDOrder->createOrder($basketProducts, $userId);
    }

    /**
     * Создание покупки и измение корзины в зависимости с от количества требуемого товара из страницы недостоющего товара
     *
     * @param $products
     * @param $userId
     * @param ServiceCRUDBasket $serviceBasket
     */
    public function OrderUpdate($products, $userId, ServiceCRUDBasket $serviceBasket)
    {

        foreach ($products->product as $product) {
            if ($product->amount != 0) {
                if ($product->pivot->count > $product->amount) {
                    $this->repositoryCRUDOrder->createOrderWithUpdateBasketAmount($product->pivot->basket_id, $product->pivot->product_id, $product->amount, $userId, $serviceBasket);
                } else {
                    $this->repositoryCRUDOrder->createOrderMissingProductPage($product->pivot->basket_id, $product->pivot->product_id, $userId, $serviceBasket);
                }
            }
        }
    }
    /**
     * Отказ от товара из страницы недостоющего товара полное удаление некупленой корзины продуктов
     *
     * @param $basketWithProduct
     *
     */
    public function OrderDestroy($basketWithProduct)
    {
        $this->repositoryCRUDOrder->destroyOrder($basketWithProduct);
    }
}
