<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Serves\ProductServiceCRUD;
use App\Serves\CategoryServiceCRUD;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function __construct(){
        $this->middleware('user');
    }

    /**
     * Получение категории и фильтр по категории
     *
     * @param Request $request
     * @param ProductServiceCRUD $catalogService
     * @param CategoryServiceCRUD $categoryService
     * @return Application|Factory|View
     */
    public function index(Request $request, ProductServiceCRUD $catalogService, CategoryServiceCRUD $categoryService)
    {
        $categoryId = $request->input('category_id');
        $categories = $categoryService->getAllCategory();
        $catalog = $catalogService->filterProducts($categoryId);
        return view('catalog.index',compact('catalog','categories'));

    }

    /**
     * Получение категории и фильтр по категории
     *
     * @param Product $product madel
     * @return Application|Factory|View
     * @var int $id
     */
    public function show(Product $product, int $id)
    {
        $product = $product->query()->where('id',$id)->first();

        return view('catalog.show',compact('product'));
    }
}
