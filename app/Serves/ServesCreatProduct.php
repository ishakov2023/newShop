<?php

namespace App\Serves;

use App\Contracts\Repositories\ProductCreatContract;
use App\Repositories\ProductCreate\RepositoryCreatProduct;

class ServesCreatProduct
{
    private  $creatProduct;
    public function __construct(ProductCreatContract $repositoryCreatProduct){
        $this->creatProduct = $repositoryCreatProduct;
    }
    public function saveProduct($validate){
        $this->creatProduct->validateAll($validate);
    }
}
