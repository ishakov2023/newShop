<?php

namespace App\Repositories\Product;

use App\Contracts\Repositories\ProductRepositoryCRUDContract;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use mysql_xdevapi\Collection;

class ProductRepositoryCRUD implements ProductRepositoryCRUDContract
{

    /**
     * Получение всех продуктов
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Product::query()->get();
    }
    /**
     * Получение продуктов по фильтру категории
     *
     * @param null $categoryId
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function getByCategoryId($categoryId = null)
    {
        return Product::query()
            ->when(!is_null($categoryId), function ($product) use ($categoryId) {
                $product->where('category_id', $categoryId);
            })->get();
    }
    /**
     * Сохранение продукта из панели админа
     *
     * @param ProductRequest $productRepository function
     */
    public function createProduct(ProductRequest $productRepository)
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
    /**
     * Изменение продукта из панели админа
     *
     * @param Request $request
     * @var int $id
     */
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
    /**
     * Получение продуктов по ID
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     * @var int $id
     */
    public function getProduct(int $id)
    {
//            пака хуй знает
        return  Product::find($id);


    }
}
