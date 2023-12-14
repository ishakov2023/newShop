<?php
namespace App\Serves;

use App\Contracts\Repositories\CategoryRepositoryCRUDContract;
use App\Repositories\Category\CategoryRepositoryCRUD;
use http\Env\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CategoryServiceCRUD
{

    private $categoryRepository;

    public function __construct(CategoryRepositoryCRUDContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Получение категорий
     *
     * @return Builder[]|Collection
     */
    public function getAllCategory()
    {
        return $this->categoryRepository->getAll();
    }
    /**
     * Создание категорий
     *
     * @param  $requestCategory
     */
    public function createCategoryDB($requestCategory){
        $this->categoryRepository->createCategory($requestCategory);
    }
    /**
     * Изменение категории
     *
     * @param  $requestCategory
     * @var int $id
     */
    public function updateCategory($requestCategory, int $id){
        $this->categoryRepository->categoryUpdate($requestCategory,$id);
    }

}
