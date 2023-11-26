<?php

namespace App\Serves;

use App\Contracts\Repositories\DeleteBasketContract;
use App\Repositories\DeleteBasket\RepositoryDeleteBasket;

class ServiceDeleteBasket
{
    private $delete;

    public function __construct(DeleteBasketContract $deleteBasket)
    {
        $this->delete = $deleteBasket;
    }

    public function deleteBasket($request,$id,$userId){
        $this->delete->basketDestroy($request,$id,$userId);

    }
}
