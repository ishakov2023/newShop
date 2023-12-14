<?php

namespace App\Serves;

use App\Contracts\Repositories\ProductRepositoryCRUDContract;
use App\Models\Basket;
use App\Repositories\Product\ProductRepositoryCRUD;
use Illuminate\Http\Request;

class ProductServiceCRUD
{
    private $productRepository;

    public function __construct(ProductRepositoryCRUDContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Фильтр продуктов по категориям
     *
     * @param null $categoryId
     */
    public function filterProducts($categoryId = null)
    {
        return $this->productRepository->getByCategoryId($categoryId);
    }
    /**
     * Сохранение продукта
     *
     * @param $request
     */
    public function saveProduct($request)
    {
        $this->productRepository->createProduct($request);
    }
    /**
     * Изменение продукта
     *
     * @param $request
     * @var int $id
     */
    public function updateProductServes($request, int $id)
    {
        $this->productRepository->updateProduct($request, $id);
    }
    /**
     * Удаление продукта и связаных корзин с этим продутом
     *
     * @var int $id
     */
    public function deleteProductAndBasket(int $id)
    {
        $product = $this->productRepository->getProduct($id);
        if (!is_null($product->basket)) {
            $product->basket->each(function (Basket $basket) {
                if (is_null($basket->pivot->deleted_at)){
                $basket->pivot->delete();
                }
            });
            $product->delete();
        }
    }
}
