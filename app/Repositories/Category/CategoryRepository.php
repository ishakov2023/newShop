<?php
namespace App\Repositories\Category;

use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryContract
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }
    public function getAll()
    {
        return $this->category->query()->get();
    }
}

