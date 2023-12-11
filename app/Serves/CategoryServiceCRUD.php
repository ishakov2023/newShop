<?php
namespace App\Serves;

use App\Contracts\Repositories\CategoryRepositoryCRUDContract;
use App\Repositories\Category\CategoryRepositoryCRUD;

class CategoryServiceCRUD
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryCRUDContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAllCategory()
    {
        return $this->categoryRepository->getAll();
    }
    public function createCategoryDB($validate){
        $this->categoryRepository->createCategory($validate);
    }
    public function updateCategory($request,$id){
        $this->categoryRepository->categoryUpdate($request,$id);
    }

}
