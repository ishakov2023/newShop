<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Serves\ServiceCRUDBasket;
use App\Serves\ServiceCreateBasket;
use App\Serves\ServiceDeleteBasket;
use App\Serves\ServiceUpdateBasket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class BasketController extends Controller
{
    public function index(ServiceCRUDBasket $basketCRUD)
    {
        $userId = Auth::user()->id;
        $basketWithProduct = $basketCRUD->basketWithProduct($userId);
        $baskets = $basketWithProduct->product;
        return view('basket/basket', compact('baskets'));
    }

    public function create(Request $request,ServiceCRUDBasket  $basketCRUD)
    {
        $productId = $request->id;
        $userId = Auth::user()->id;
        $basketCRUD->creatBasket($productId,$userId);
        return redirect()->back();
    }
    public function update(Request $request,$id,ServiceCRUDBasket  $basketCRUD){
        $basketId = $request->basketId;
        $basketCRUD->updateBasket($request,$id,$basketId);
        return redirect()->back();
    }
    public function delete(Request $request,$id,ServiceCRUDBasket  $basketCRUD){
        $basketId = $request->basketId;
        $userId = Auth::user()->id;
        $basketCRUD->deleteBasket($request,$id,$basketId);
        return redirect()->back();
    }
}
