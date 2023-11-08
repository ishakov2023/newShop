<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->input('category_id');
        $catalogFil = Product::query()->get(['id','name','price','amount','category_id'])->toArray();
        $categories = [
            null =>__('Все товары'),
            1 => __('ПК'),
            2 => __('Ноутбуки'),
        ];
        $catalog = array_filter($catalogFil,function ($catalogs) use ($category_id){
            if ($category_id && $catalogs['category_id'] != $category_id){
                return false;
            }
            return true;
        });
//        ХУЙНЯ ПЕРЕДЕЛАТЬ



        return view('catalog.index',compact('catalog','categories'));

    }
    public function show(Request $request,Product $catalog)
    {

        return view('catalog.show',compact('catalog'));
    }
}
