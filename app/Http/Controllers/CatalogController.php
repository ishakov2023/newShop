<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Serves\CatalogService;
use App\Serves\CategoryService;
use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $request,CatalogService $catalogService,CategoryService $categoryService)
    {
        $categoryId = $request->input('category_id');
        $categories = $categoryService->getAllCategory();
        $catalog = $catalogService->filterProducts($categoryId);
        return view('catalog.index',compact('catalog','categories'));

    }
    public function show(Request $request,Product $catalog)
    {

        return view('catalog.show',compact('catalog'));
    }
}
