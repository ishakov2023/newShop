<?php
namespace App\Serves;

use App\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryService;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryService=$categoryRepository;
    }
    public function getAllCategory()
    {
        return $this->categoryService->getAll();
    }

}
