<?php

namespace App\Serves;

use App\Contracts\Repositories\AdminDeleteContract;
use App\Models\Basket;

class ServiceDelProductAndBasket
{
    private $deleteProductAndBask;

    public function __construct(AdminDeleteContract $adminDeleteContract)
    {
        $this->deleteProductAndBask = $adminDeleteContract;
    }

    public function deleteAdmin($id)
    {
        $product = $this->deleteProductAndBask->productBasketDelete($id);
        if (!is_null($product)) {
            $product->basket->each(function (Basket $basket) {
                $basket->delete();
            });
            $product->delete();
        }
    }
}

