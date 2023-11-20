<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Serves\ServiceBasket;
use App\Serves\ServiceCreateBasket;
use App\Serves\ServiceUpdateBasket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class BasketController extends Controller
{
    public function index(ServiceBasket $serviceBasket)
    {
        $userId = Auth::user()->id;
        $products = $serviceBasket->productIsBasket($userId);
        return view('basket/basket', compact('products'));
    }

    public function create(Request $request,ServiceCreateBasket $createBasket)
    {
        $productId = $request->id;
        $userId = Auth::user()->id;
        $createBasket->creatBasket($productId,$userId);
        return redirect()->back();
    }
    public function update(Request $request,$id,ServiceUpdateBasket $updateBasket){
        $productId = $request->id;
        $userId = Auth::user()->id;
        $updateBasket->updateBasket($request,$productId,$userId);
        return redirect()->back();
    }
    public function delete(Request $request,$id){
        $userId = Auth::user()->id;
        $basket = Basket::query()->where(['product_id'=>$id,'user_id'=>$userId]);
        if ($request->input('delete')){
            $basket->delete();
            return redirect()->back();
        }
    }
}
