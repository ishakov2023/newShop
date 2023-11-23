<?php

namespace App\Repositories\ProductCreate;

use App\Contracts\Repositories\ProductCreatContract;
use App\Contracts\Repositories\ProductRepositoryContract;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class RepositoryCreatProduct implements ProductCreatContract
{
  public function validateAll(ProductRequest $productRepository){
      $validate = $productRepository->validated();
      return Product::query()->create([
          'name' => $validate['nameNew'],
          'description' => $validate['descriptionNew'],
          'price' => $validate['priceNew'],
          'amount' => $validate['amountNew'],
          'category_id' => $validate['categoryIdNew'],
      ])->save();
  }
}
