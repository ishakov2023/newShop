<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Serves\CategoryService;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
        public function __construct(){
            $this->middleware('admin');
    }
    public function index(Product $product,CategoryService $categoryService)
    {
        $categories = $categoryService->getAllCategory();
        $products = $product->query()->get();
        return view('admin/admin',compact('products','categories'));
    }
    public function store(Request $request){
        return $request->all();
    }
    public function update(Request $request,$id){
            dd($id);
    }
}
