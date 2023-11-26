<?php

namespace App\Serves;

use App\Contracts\Repositories\UpdateCategoryContract;
use App\Repositories\UpdateCategory\RepositoryUpdateCategory;

class ServesUpdateCategory
{
    private $category;

    public function __construct(UpdateCategoryContract $updateCategory){
        $this->category = $updateCategory;
    }
    public function updateCategory($request,$id){
        $this->category->categoryUpdate($request,$id);
    }
}
