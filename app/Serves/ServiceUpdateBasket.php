<?php

namespace App\Serves;

use App\Contracts\Repositories\UpdateBasketContract;
use App\Repositories\UpdateBasket\RepositoryUpdateBasket;
use Illuminate\Http\Request;

class ServiceUpdateBasket
{
    private $update;

    public function __construct(UpdateBasketContract $updateBasket){
        $this->update=$updateBasket;
    }
    public function updateBasket(Request $request,$productId,$userId){
        $this->update->updateBasketIsButton($request,$productId,$userId);
    }
}
