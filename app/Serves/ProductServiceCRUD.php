<?php

namespace App\Serves;

use App\Contracts\Repositories\ProductRepositoryCRUDContract;
use App\Models\Basket;
use App\Repositories\Product\ProductRepositoryCRUD;

class ProductServiceCRUD
{
    private $productRepository;

    public function __construct(ProductRepositoryCRUDContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function filterProducts($categoryId = null)
    {
        return $this->productRepository->getByCategoryId($categoryId);
    }

    public function saveProduct($validate)
    {
        $this->productRepository->validateAll($validate);
    }

    public function updateProductServes($response, $id)
    {
        $this->productRepository->updateProduct($response, $id);
    }

    public function deleteProductAndBasket($id)
    {
        $product = $this->productRepository->productBasketDelete($id);
        if (!is_null($product->basket)) {
            $product->basket->each(function (Basket $basket) {

                $basket->pivot->delete();
            });
            $product->delete();
        }
    }
}
