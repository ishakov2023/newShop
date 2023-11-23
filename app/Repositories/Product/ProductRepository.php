<?php

namespace App\Repositories\Product;

use App\Contracts\Repositories\ProductRepositoryContract;
use App\Models\Product;

class ProductRepository implements ProductRepositoryContract
{


    public function getAll()
    {
        return Product::query()->get();
    }

    public function getByCategoryId($categoryId = null)
    {
        return Product::query()
            ->when(!is_null($categoryId), function ($product) use ($categoryId) {
                $product->where('category_id',$categoryId);
            })->get();
    }
}
