<?php

namespace App\Repositories\Product;

use App\Contracts\Repositories\ProductRepositoryCRUDContract;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepositoryCRUD implements ProductRepositoryCRUDContract
{


    public function getAll()
    {
        return Product::query()->get();
    }

    public function getByCategoryId($categoryId = null)
    {
        return Product::query()
            ->when(!is_null($categoryId), function ($product) use ($categoryId) {
                $product->where('category_id', $categoryId);
            })->get();
    }

    public function validateAll(ProductRequest $productRepository)
    {
        $validate = $productRepository->validated();
        return Product::query()->create([
            'name' => $validate['nameNew'],
            'description' => $validate['descriptionNew'],
            'price' => $validate['priceNew'],
            'amount' => $validate['amountNew'],
            'category_id' => $validate['categoryIdNew'],
        ])->save();
    }

    public function updateProduct(Request $request, $id)
    {
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $amount = $request->amount;
        Product::query()
            ->where('id', $id)
            ->update(['name' => $name,
                'description' => $description,
                'price' => $price,
                'amount' => $amount,
            ]);
    }

    public function productBasketDelete($id)
    {
//            пака хуй знает
        return  Product::find($id);


    }
}
