<?php

namespace App\Serves;

use App\Repositories\RepositoryUpdateBasket;
use Illuminate\Http\Request;

class ServiceUpdateBasket
{
    private $update;

    public function __construct(RepositoryUpdateBasket $updateBasket){
        $this->update=$updateBasket;
    }
    public function updateBasket(Request $request,$productId,$userId){
        $this->update->updateBasket($request,$productId,$userId);
    }
}
