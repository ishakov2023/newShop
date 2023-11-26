<?php

namespace App\Repositories\DeleteBasketAndProduct;

use App\Contracts\Repositories\AdminDeleteContract;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class RepositoryRawDelProduct implements AdminDeleteContract
{
    public function productBasketDelete($id): ?Product
    {
        DB::delete('DELETE products , baskets  FROM products  INNER JOIN baskets
            WHERE products.id = baskets.product_id and products.id = ?', [$id]);
        return null;
    }
}
