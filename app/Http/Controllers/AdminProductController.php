<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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
    public function store(ProductRequest $request){
        $validate = $request->validated();
        $product = Product::query()->create([
            'name' => $validate['nameNew'],
            'description' => $validate['descriptionNew'],
            'price' => $validate['priceNew'],
            'amount' => $validate['amountNew'],
            'category_id' => $validate['categoryIdNew'],
        ]);
        $product->save();
        return redirect()->back();
    }
    public function update(Request $request,$id){
        return $request->input('name',$id);
    }
    public function delete($id){
         Product::query()->where('id',  $id)->delete();
         return redirect()->back();
    }
}
