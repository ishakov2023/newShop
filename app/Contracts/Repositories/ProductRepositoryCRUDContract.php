<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

interface ProductRepositoryCRUDContract
{
    public function getAll();
    public function getByCategoryId();
    public function validateAll(ProductRequest $productRepository);
    public function updateProduct(Request $request,$id);
}
