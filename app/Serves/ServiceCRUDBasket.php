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
    /**
     * Получение корзин и продуктов пользователя
     *
     * @var int $userId
     */
    public function basketWithProduct(int $userId)
    {
        return $this->repository->getByUser($userId);
    }

    public function getAllBasketProduct()
    {
        return $this->repository->getBasketProduct();
    }

    /**
     * Сохарние коризины пользователя и корзины продуктов
     *
     * @var int $userId
     * @var int $productId
     */
    public function creatBasketAndProductBasket(int $productId,int $userId){
        return $this->repository->createBasket($productId,$userId);
    }
    /**
     * Увелечение или уменьшение количества товара в корзины до полного удаления
     *
     * @param Request $request
     * @var int $basketId
     * @var int $productId
     */
    public function updateBasket(Request $request, int $productId, int $basketId){

        if ($request->input('plus') && ($request->count < $request->amount)){
            return $this->repository->updateBasketPlus($request,$productId,$basketId);
        }elseif ($request->input('minus') && ($request->count > 0)){
            return $this->repository->updateBasketMinus($request,$productId,$basketId);
        }elseif($request->input('minus') && ($request->count == 0)){
            return $this->repository->basketDestroy($request,$productId,$basketId);
        }
    }
    /**
     * Увелечение или уменьшение количества товара в корзины до полного удаления
     *
     * @param Request $request
     * @var int $basketId
     * @var int $id
     */
    public function deleteBasket($request,int $id,int $basketId)
    {
        if ($request->input('delete')) {
            return $this->repository->basketDestroy($request, $id, $basketId);
        }
    }

}
