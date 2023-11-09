<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
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
