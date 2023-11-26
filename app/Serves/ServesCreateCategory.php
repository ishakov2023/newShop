<?php

namespace App\Serves;

use App\Contracts\Repositories\CreateCategoryContract;
use App\Repositories\CreateCategory\RepositoryCreateCategory;

class ServesCreateCategory
{
    private $category;

    public function __construct(CreateCategoryContract $storeCategory){
        $this->category = $storeCategory;
    }
    public function saveCategoryDB($validate){
        $this->category->saveCategory($validate);
    }
}
