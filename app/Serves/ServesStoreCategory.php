<?php

namespace App\Serves;

use App\Repositories\RepositoryStoreCategory;

class ServesStoreCategory
{
    private $category;

    public function __construct(RepositoryStoreCategory $storeCategory){
        $this->category = $storeCategory;
    }
    public function saveCategoryDB($validate){
        $this->category->saveCategory($validate)->save();
    }
}
