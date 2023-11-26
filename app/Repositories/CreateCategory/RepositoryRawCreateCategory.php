<?php

namespace App\Repositories\CreateCategory;

use App\Contracts\Repositories\CreateCategoryContract;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class RepositoryRawCreateCategory implements CreateCategoryContract
{
        public function saveCategory(CategoryRequest $categoryRequest)
        {
            $validate = $categoryRequest->validated();
            return DB::insert('insert into categories (name) value (?)',[$validate['nameNew']]);
        }
}
