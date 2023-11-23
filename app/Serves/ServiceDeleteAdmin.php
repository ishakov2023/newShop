<?php

namespace App\Serves;

use App\Contracts\Repositories\AdminDeleteContract;
use App\Models\Basket;

class ServiceDeleteAdmin
{
    private $deleteAdminDB;

    public function __construct(AdminDeleteContract $adminDeleteContract)
    {
        $this->deleteAdminDB = $adminDeleteContract;
    }

    public function deleteAdmin($id)
    {
        $product = $this->deleteAdminDB->productBasketDelete($id);
        if (!is_null($product)) {
            $product->basket->each(function (Basket $basket) {
                $basket->delete();
            });
            $product->delete();
        }
    }
}

