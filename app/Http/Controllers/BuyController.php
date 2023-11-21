<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Serves\ServiceBasket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    public function index(ServiceBasket $serviceBasket){
        $userId = Auth::user()->id;
        $products = $serviceBasket->productIsBasket($userId);
        foreach ($products as $product){
           if ($product->count <= $product->amount){
               Product::query()->where(['id'=>$product->id])->decrement('amount',$product->count);
           }
        }
        return view('buy.buy');
    }

}
