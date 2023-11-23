<?php

namespace App\Repositories\Product;

use App\Contracts\Repositories\ProductRepositoryContract;

use Illuminate\Support\Facades\DB;

class ProductRawRepository implements ProductRepositoryContract
{
    public function getAll()
    {
        return DB::select('SELECT * FROM `products` ');
    }

    public function getByCategoryId($categoryId = null)
    {
        if (!is_null($categoryId)){
          return  DB::select('SELECT * FROM `products` WHERE `category_id` = ?',[$categoryId]);
        }else{
            return  DB::select('SELECT * FROM `products` ');
        }
    }
}
