<?php

namespace App\Contracts\Repositories;

interface BasketCreateContract
{
    public function selectBasket($productId,$userId);
}
