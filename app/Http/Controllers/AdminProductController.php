<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Basket;
use App\Models\Product;
use App\Serves\CategoryServiceCRUD;
use App\Serves\ProductServiceCRUD;
use App\Serves\ServesCreatProduct;
use App\Serves\ServesUpdateProduct;
use App\Serves\ServiceDelProductAndBasket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
        public function __construct(){
            $this->middleware('admin');
    }
    public function index(Product $product, CategoryServiceCRUD $categoryService)
    {
        $categories = $categoryService->getAllCategory();
        $products = $product->query()->get();
        $user = Auth::user();
        return view('admin/admin',compact('products','categories','user'));
    }
    public function store(ProductRequest $request,ProductServiceCRUD $productServiceCRUD){
        $productServiceCRUD->saveProduct($request);
         return redirect()->back();
    }
    public function update(Request $request,$id,ProductServiceCRUD $productServiceCRUD){
        $productServiceCRUD->updateProductServes($request,$id);
        return redirect()->back();
    }
    public function delete(ProductServiceCRUD $productServiceCRUD, $id){
            $productServiceCRUD->deleteProductAndBasket($id);
         return redirect()->back();
    }
}
