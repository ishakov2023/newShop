<?php

namespace App\Serves;

use App\Contracts\Repositories\BasketRepositoryContract;
use App\Repositories\Basket\RepositoryBasket;

class ServiceBasket
{
        private $repository;

        public function __construct(BasketRepositoryContract $repositoryBasket){
            $this->repository = $repositoryBasket;
        }
        public function productIsBasket($userId){
           return $this->repository->basket($userId);
        }
}
