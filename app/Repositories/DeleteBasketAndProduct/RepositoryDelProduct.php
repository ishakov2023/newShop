<?php

namespace App\Repositories\DeleteBasketAndProduct;

use App\Contracts\Repositories\AdminDeleteContract;
use App\Models\Basket;
use App\Models\Product;

class RepositoryDelProduct implements AdminDeleteContract
{
    private $connect;

    public function __construct(){
        $this->connect = Product::query();
    }
        public function productBasketDelete($id): ?Product
        {
//            пака хуй знает
           return $this->connect->where('id',$id)->with('basket')->first();
        }
}
