<?php

namespace App\Serves;


use App\Repositories\RepositoryUpdateProduct;


class ServesUpdateProduct
{
    private $servesUpdate;
    public function __construct(RepositoryUpdateProduct $repositoryUpdateProduct){
        $this->servesUpdate = $repositoryUpdateProduct;
    }
    public function updateProductServes($response,$id){
       $this->servesUpdate->updateProduct($response,$id);
    }
}
