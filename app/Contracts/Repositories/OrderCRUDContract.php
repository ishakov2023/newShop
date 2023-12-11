<?php

namespace App\Contracts\Repositories;

use App\Serves\ServiceCRUDBasket;

interface OrderCRUDContract
{
    public function createOrder($basketProducts, $userId);
    public function updateOrderWithAmount($basketId,$productId ,$productAmount,$userId,ServiceCRUDBasket $serviceBasket);
    public function updateOrder($basketId,$productId ,$userId,ServiceCRUDBasket $serviceBasket);
    public function destroyOrder($products);
}
