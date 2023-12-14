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
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminProductController extends Controller
{
        public function __construct(){
            $this->middleware('admin');
    }
    /**
     * Получение категории, пользвателя и продуктов
     *
     * @param CategoryServiceCRUD $categoryService function
     * @param Product $product collection
     * @return Application|Factory|View
     */
    public function index(Product $product, CategoryServiceCRUD $categoryService)
    {
        $categories = $categoryService->getAllCategory();
        $products = $product->query()->get();
        $user = Auth::user();
        return view('admin/admin',compact('products','categories','user'));
    }
    /**
     *  сохранение продукта
     *
     * @param ProductServiceCRUD $productServiceCRUD function
     * @param ProductRequest $request Request
     */
    public function store(ProductRequest $request,ProductServiceCRUD $productServiceCRUD){
        $productServiceCRUD->saveProduct($request);
         return redirect()->back();
    }

    /**
     * Изменения продукта
     *
     * @param ProductServiceCRUD $productServiceCRUD function
     * @param Request $request Request
     * @return RedirectResponse
     * @var int $id
     */
    public function update(ProductServiceCRUD $productServiceCRUD, Request $request, int $id){
        $productServiceCRUD->updateProductServes($request,$id);
        return redirect()->back();
    }
    /**
     *  Изменения продукта
     *
     * @param ProductServiceCRUD $productServiceCRUD function
     * @return RedirectResponse
     * @var int $id
     */
    public function delete(ProductServiceCRUD $productServiceCRUD, int $id){
            $productServiceCRUD->deleteProductAndBasket($id);
         return redirect()->back();
    }
}
