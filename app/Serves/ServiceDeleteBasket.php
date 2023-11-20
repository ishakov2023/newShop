<?php

namespace App\Serves;

use App\Repositories\RepositoryDeleteBasket;

class ServiceDeleteBasket
{
    private $delete;

    public function __construct(RepositoryDeleteBasket $deleteBasket)
    {
        $this->delete = $deleteBasket;
    }

    public function deleteBasket($request,$id,$userId){
        $this->delete->delete($request,$id,$userId);

    }
}
