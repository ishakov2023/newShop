<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Serves\ServiceBasket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(ServiceBasket $serviceBasket){
        $userId = Auth::user()->id;
        $products = $serviceBasket->productIsBasket($userId);
//        dd($products);
        foreach ($products as $product){
           if ($product->count <= $product->amount){
               Product::query()->where(['id'=>$product->id])->decrement('amount',$product->count);
               $bask = Basket::query()->where(['product_id'=>$product->id,'user_id'=>$product->user_id])->get();
               foreach ($bask as $basket){
                   Order::query()->where(['user_'])->create(['basket_id'=>$basket->id,
                       'user_id'=>$userId]);
               }
           }else{
               return view('buy.buy',compact('products'));
           }
        }
        return 'Покупка успешно оформленна';
    }
    public function update(ServiceBasket $serviceBasket,$id)
    {
        $userId = Auth::user()->id;
        $products = $serviceBasket->productIsBasket($userId);
        foreach ($products as $product) {
            Product::query()->where(['id' => $product->id])->update(['amount'=>0]);
            $bask = Basket::query()->where(['product_id'=>$product->id,'user_id'=>$product->user_id])->get();
            foreach ($bask as $basket){
                Order::query()->create(['basket_id'=>$basket->id,
                    'user_id'=>$userId]);
            }
        }
        return 'Покупка успешно оформленна';
    }
    public function delete($id){
        $userId = Auth::user()->id;
        $bask = Basket::query()->where(['user_id'=>$userId])->delete();
        dd($bask);
        return redirect()->route('user.catalog');
    }

}
