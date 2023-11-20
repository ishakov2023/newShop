<?php

namespace App\Serves;

use App\Repositories\RepositoryCreateBasket;

class ServiceCreateBasket
{
    private $creat;

    public function __construct(RepositoryCreateBasket $createBasket){
        $this->creat=$createBasket;
    }
    public function creatBasket($productId,$userId){
        return $this->creat->creatBasket($productId,$userId);
    }
}
