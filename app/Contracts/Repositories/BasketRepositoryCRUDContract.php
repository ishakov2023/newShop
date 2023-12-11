<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface BasketRepositoryCRUDContract
{
    public function getByUser($userId);
    public function getBasketProduct();
    public function createBasket($productId, $userId);

    public function updateBasketPlus(Request $request, $productId, $basketId);

    public function updateBasketMinus(Request $request, $productId, $basketId);

    public function basketDestroy(Request $request, $id, $basketId);
    public function basketDelete( $basketId,$id);

}
