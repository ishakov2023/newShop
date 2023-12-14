<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Serves\CategoryServiceCRUD;
use App\Serves\ServesCreateCategory;
use App\Serves\ServesUpdateCategory;
use Couchbase\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Получение категории продуктов и пользователя
     *
     * @param CategoryServiceCRUD $categoryService function
     */
    public function index(CategoryServiceCRUD $categoryService){
        $categories = $categoryService->getAllCategory();
        $user = Auth::user();
        return view('admin/category',compact('categories','user'));
    }
    /**
     * Добавление новой категории
     *
     * @param CategoryServiceCRUD $categoryService function
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request, CategoryServiceCRUD $categoryService){
        $categoryService->createCategoryDB($request);
        return redirect()->back();
    }

    /**
     * Измение категории товара
     *
     * @param Request $request
     * @param CategoryServiceCRUD $categoryService function
     * @param $id integer
     * @return RedirectResponse
     */
    public function update(Request $request, CategoryServiceCRUD $categoryService, int $id){
        $categoryService->updateCategory($request,$id);
        return redirect()->back();
    }
    /**
     * Удаление категории товара
     *
     * @param $id integer
     * @return RedirectResponse
     */
    public function delete(int $id){
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->back();
    }
}
