<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\CategoryRequest;

interface CreateCategoryContract
{
    public function saveCategory(CategoryRequest $categoryRequest) ;
}
