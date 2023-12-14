<?php

namespace App\Contracts\Repositories;

use App\Serves\ServiceCRUDBasket;

interface OrderCRUDContract
{
    public function createOrder($basketProducts, $userId);
    public function createOrderWithUpdateBasketAmount($basketId, $productId , $productAmount, $userId, ServiceCRUDBasket $serviceBasket);
    public function createOrderMissingProductPage($basketId, $productId , $userId, ServiceCRUDBasket $serviceBasket);
    public function destroyOrder($basketWithProduct);
}
