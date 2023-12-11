<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Serves\ProductServiceCRUD;
use App\Serves\CategoryServiceCRUD;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function __construct(){
        $this->middleware('user');
    }
    public function index(Request $request, ProductServiceCRUD $catalogService, CategoryServiceCRUD $categoryService)
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
