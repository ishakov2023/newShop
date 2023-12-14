<?php
namespace App\Repositories\Category;

use App\Contracts\Repositories\CategoryRepositoryCRUDContract;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CategoryRepositoryCRUD implements CategoryRepositoryCRUDContract
{


    /**
     * Получение категорий
     *
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        return Category::query()->get();
    }
    /**
     * Создание категории товара
     *
     * @param CategoryRequest $categoryRequest
     */
    public function createCategory(CategoryRequest $categoryRequest)
    {
        $validate = $categoryRequest->validated();
        Category::query()->create([
            'name' => $validate['nameNew'],
        ])->save();
    }
    /**
     * Измение категории товара
     *
     * @param Request $request
     * @var int $id
     */
    public function categoryUpdate(Request $request,$id){
        $name = $request->input('name');
        Category::query()
            ->where('id', $id)
            ->update(['name' => $name,
            ]);
    }
}

