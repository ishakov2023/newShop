<?php

namespace App\Serves;

use App\Repositories\RepositoryCreatProduct;

class ServesCreatProduct
{
    private  $creatProduct;
    public function __construct(RepositoryCreatProduct $repositoryCreatProduct){
        $this->creatProduct = $repositoryCreatProduct;
    }
    public function saveProduct($validate){
        $this->creatProduct->validateAll($validate)->save();
    }
}
