<?php

namespace App\Serves;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class CatalogService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function filterProducts($categoryId = null)
    {
        return $this->productRepository->getByCategoryId($categoryId);
    }
}
