<?php

namespace App\Serves;


use App\Contracts\Repositories\UpdateProductContract;
use App\Repositories\UpdateProduct\RepositoryUpdateProduct;


class ServesUpdateProduct
{
    private $servesUpdate;
    public function __construct(UpdateProductContract $repositoryUpdateProduct){
        $this->servesUpdate = $repositoryUpdateProduct;
    }
    public function updateProductServes($response,$id){
       $this->servesUpdate->updateProduct($response,$id);
    }
}
