<?php

namespace App\Repositories;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class RepositoryStoreCategory
{

    public function saveCategory(CategoryRequest $categoryRequest){
        $validate = $categoryRequest->validated();
        return Category::query()->create([
            'name' => $validate['nameNew'],
        ]);
    }
}
