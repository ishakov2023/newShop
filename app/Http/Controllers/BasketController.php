<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Serves\ServiceCRUDBasket;
use App\Serves\ServiceCreateBasket;
use App\Serves\ServiceDeleteBasket;
use App\Serves\ServiceUpdateBasket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use function PHPUnit\Framework\isEmpty;

class BasketController extends Controller
{
    /**
     * Получения продуктов из корзины
     *
     * @param ServiceCRUDBasket $basketCRUD function
     */
    public function index(ServiceCRUDBasket $basketCRUD)
    {
        $userId = Auth::user()->id;
        $basketWithProduct = $basketCRUD->basketWithProduct($userId);
        $baskets = $basketWithProduct->product;
        return view('basket/basket', compact('baskets'));
    }
    /**
     * Сохранения продуктов в корзине
     *
     * @param ServiceCRUDBasket $basketCRUD function
     */
    public function create(Request $request,ServiceCRUDBasket  $basketCRUD)
    {
        $productId = $request->id;
        $userId = Auth::user()->id;
        $basketCRUD->creatBasketAndProductBasket($productId,$userId);
        return redirect()->back();
    }

    /**
     * Измение количество продукта в корзине
     *
     * @param Request $request
     * @param ServiceCRUDBasket $basketCRUD function
     * @return RedirectResponse
     * @var int $id
     */
    public function update(Request $request, int $id, ServiceCRUDBasket $basketCRUD){
        $basketId = $request->basketId;
        $basketCRUD->updateBasket($request,$id,$basketId);
        return redirect()->back();
    }

    /**
     * Удаление продукта из корзины
     *
     * @param Request $request
     * @param ServiceCRUDBasket $basketCRUD function
     * @return RedirectResponse
     * @var int $id
     */
    public function delete(Request $request, int $id, ServiceCRUDBasket $basketCRUD){
        $basketId = $request->basketId;
        $basketCRUD->deleteBasket($request,$id,$basketId);
        return redirect()->back();
    }
}
