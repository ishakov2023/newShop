<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class RepositoryCreatProduct
{
  public function validateAll(ProductRequest $productRepository){
      $validate = $productRepository->validated();
      return Product::query()->create([
          'name' => $validate['nameNew'],
          'description' => $validate['descriptionNew'],
          'price' => $validate['priceNew'],
          'amount' => $validate['amountNew'],
          'category_id' => $validate['categoryIdNew'],
      ]);
  }
}
