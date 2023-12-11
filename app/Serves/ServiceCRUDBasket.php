<?php

namespace App\Serves;

use App\Contracts\Repositories\BasketCreateContract;
use App\Contracts\Repositories\BasketRepositoryCRUDContract;
use App\Contracts\Repositories\DeleteBasketContract;
use App\Contracts\Repositories\UpdateBasketContract;
use App\Repositories\Basket\RepositoryCRUDBasket;
use Illuminate\Http\Request;

class ServiceCRUDBasket
{
    private $repository;


    public function __construct(BasketRepositoryCRUDContract $repositoryBasket)
    {
        $this->repository = $repositoryBasket;

    }

    public function basketWithProduct($userId)
    {
        return $this->repository->getByUser($userId);
    }

    public function getAllBasketProduct()
    {
        return $this->repository->getBasketProduct();
    }
    public function creatBasket($productId,$userId){
        return $this->repository->createBasket($productId,$userId);
    }
    public function updateBasket(Request $request,$productId,$basketId){

        if ($request->input('plus') && ($request->count < $request->amount)){
            return $this->repository->updateBasketPlus($request,$productId,$basketId);
        }elseif ($request->input('minus') && ($request->count > 0)){
            return $this->repository->updateBasketMinus($request,$productId,$basketId);
        }elseif($request->input('minus') && ($request->count == 0)){
            return $this->repository->basketDestroy($request,$productId,$basketId);
        }
    }
    public function deleteBasket($request,$id,$basketId)
    {
        if ($request->input('delete')) {
            return $this->repository->basketDestroy($request, $id, $basketId);
        }
    }
        public function softDeleteBasket($basketId,$id){

                return $this->repository->basketDelete($basketId,$id);

    }

}
