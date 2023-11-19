<?php

namespace App\Serves;

use App\Repositories\RepositoryUpdateCategory;

class ServesUpdateCategory
{
    private $category;

    public function __construct(RepositoryUpdateCategory $updateCategory){
        $this->category = $updateCategory;
    }
    public function updateCategory($request,$id){
        $this->category->categoryUpdate($request,$id);
    }
}
