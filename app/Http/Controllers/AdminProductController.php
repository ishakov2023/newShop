<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Basket;
use App\Models\Product;
use App\Serves\CategoryService;
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
    public function index(Product $product,CategoryService $categoryService)
    {
        $categories = $categoryService->getAllCategory();
        $products = $product->query()->get();
        $user = Auth::user();
        return view('admin/admin',compact('products','categories','user'));
    }
    public function store(ProductRequest $request,ServesCreatProduct $servesCreatProduct){
         $servesCreatProduct->saveProduct($request);
         return redirect()->back();
    }
    public function update(Request $request,$id,ServesUpdateProduct $servesUpdateProduct){
        $servesUpdateProduct->updateProductServes($request,$id);
        return redirect()->back();
    }
    public function delete(ServiceDelProductAndBasket $serviceDeleteAdmin, $id){
            $serviceDeleteAdmin->deleteAdmin($id);
         return redirect()->back();
    }
}
