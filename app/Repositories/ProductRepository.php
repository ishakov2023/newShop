<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository
{
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function getAll()
    {
        return $this->product->query()->get();
    }

    public function getByCategoryId($categoryId = null)
    {
        return $this->product
            ->query()
            ->when(!is_null($categoryId), function ($product) use ($categoryId) {
                $product->where('category_id',$categoryId);
            })->get();
    }
}
