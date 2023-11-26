<?php

namespace App\Repositories\CreateCategory;

use App\Contracts\Repositories\CreateCategoryContract;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class RepositoryCreateCategory implements CreateCategoryContract
{

    public function saveCategory(CategoryRequest $categoryRequest)
    {
        $validate = $categoryRequest->validated();
        return Category::query()->create([
            'name' => $validate['nameNew'],
        ])->save();
    }
}
