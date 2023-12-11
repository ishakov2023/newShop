<?php
namespace App\Repositories\Category;

use App\Contracts\Repositories\CategoryRepositoryCRUDContract;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepositoryCRUD implements CategoryRepositoryCRUDContract
{



    public function getAll()
    {
        return Category::query()->get();
    }
    public function createCategory(CategoryRequest $categoryRequest)
    {
        $validate = $categoryRequest->validated();
        return Category::query()->create([
            'name' => $validate['nameNew'],
        ])->save();
    }
    public function categoryUpdate(Request $request,$id){
        $name = $request->input('name');
        Category::query()
            ->where('id', $id)
            ->update(['name' => $name,
            ]);
    }
}

