<?php

namespace App\Serves;

use App\Repositories\RepositoryBasket;

class ServiceBasket
{
        private $repository;

        public function __construct(RepositoryBasket $repositoryBasket){
            $this->repository = $repositoryBasket;
        }
        public function productIsBasket($userId){
           return $this->repository->basket($userId);
        }
}
