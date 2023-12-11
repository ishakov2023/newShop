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

    public function createOrder($createOrder, $userId)
    {
        $this->repositoryCRUDOrder->createOrder($createOrder, $userId);
    }

    public function OrderUpdate($products, $userId, ServiceCRUDBasket $serviceBasket)
    {

        foreach ($products->product as $product) {
            if ($product->amount != 0) {
                if ($product->pivot->count > $product->amount) {
                    $this->repositoryCRUDOrder->updateOrderWithAmount($product->pivot->basket_id, $product->pivot->product_id, $product->amount, $userId, $serviceBasket);
                } else {
                    $this->repositoryCRUDOrder->updateOrder($product->pivot->basket_id, $product->pivot->product_id, $userId, $serviceBasket);
                }
            }
        }
    }

    public function OrderDestroy($products)
    {
        $this->repositoryCRUDOrder->destroyOrder($products);
    }
}
