<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

interface CategoryRepositoryCRUDContract
{
    public function getAll();
    public function createCategory(CategoryRequest $categoryRequest);
    public function categoryUpdate(Request $request,$id);
}
