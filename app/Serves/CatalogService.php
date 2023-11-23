<?php

namespace App\Serves;

use App\Contracts\Repositories\ProductRepositoryContract;
use App\Repositories\Product\ProductRepository;

class CatalogService
{
    private $productRepository;

    public function __construct(ProductRepositoryContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function filterProducts($categoryId = null)
    {
        return $this->productRepository->getByCategoryId($categoryId);
    }
}
