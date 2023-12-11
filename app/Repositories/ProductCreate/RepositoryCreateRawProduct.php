<?php

namespace App\Repositories\ProductCreate;

use App\Contracts\Repositories\ProductCreatContract;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Product\ProductRawRepositoryCRUD;
use Illuminate\Support\Facades\DB;

class RepositoryCreateRawProduct implements ProductCreatContract
{
    public function validateAll(ProductRequest $productRepository){
        $validate = $productRepository->validated();
        return DB::insert('INSERT INTO `products` (`name`, `description`, `price`, `amount`, `category_id`) VALUES ( ?,?,?,?,?)',
            [$validate['nameNew'],$validate['descriptionNew'],$validate['priceNew'],$validate['amountNew'],$validate['categoryIdNew']]);


//        return Product::query()->create([
//            'name' => $validate['nameNew'],
//            'description' => $validate['descriptionNew'],
//            'price' => $validate['priceNew'],
//            'amount' => $validate['amountNew'],
//            'category_id' => $validate['categoryIdNew'],
//        ]);
    }
}
