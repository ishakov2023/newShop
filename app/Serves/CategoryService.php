<?php
namespace App\Serves;

use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Repositories\Category\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAllCategory()
    {
        return $this->categoryRepository->getAll();
    }

}
