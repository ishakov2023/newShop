<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\ProductRequest;

interface ProductCreatContract
{
    public function validateAll(ProductRequest $productRepository);
}
