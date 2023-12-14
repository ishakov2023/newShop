<?php

namespace App\Http\Controllers;

use App\Events\OrderEvent;
use App\Exceptions\OrderCreateException;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\Product;
use App\Serves\ServiceCRUDBasket;
use App\Serves\ServiceCRUDOrder;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        return view('buy.index');
    }
    /**
     * Создание покупки
     *
     * @param ServiceCRUDBasket $serviceBasket function
     * @param ServiceCRUDOrder $serviceCRUDOrder function
     * @return \Illuminate\View\View
     */
    public function makeOrder(ServiceCRUDBasket $serviceBasket, ServiceCRUDOrder $serviceCRUDOrder)
    {
        $userId = Auth::user()->id;
        $user = Auth::user();
        $orderBasket = $user->basket;
        $basketProducts = BasketProduct::query()->where('basket_id',$orderBasket->id)->get();
        try {
            $serviceCRUDOrder->createOrder($basketProducts,$userId);
        } catch (OrderCreateException $exception) {
            $products = $serviceBasket->basketWithProduct($userId);
            return view('buy.buy', compact('products'));
        }

        return view('buy.index');
    }

    /**
     * Покупка товара
     *
     * @param ServiceCRUDBasket $serviceBasket function
     * @param ServiceCRUDOrder $serviceCRUDOrder function
     * @return \Illuminate\View\View
     */
    public function update(ServiceCRUDBasket $serviceBasket, ServiceCRUDOrder $serviceCRUDOrder)
    {
        $userId = Auth::user()->id;
        $products = $serviceBasket->basketWithProduct($userId);
        $serviceCRUDOrder->OrderUpdate($products,$userId,$serviceBasket);
        return view('buy.index');

    }
    /**
     * Удаление продуктов из корзины при отказе от покупки
     *
     * @param ServiceCRUDBasket $serviceBasket function
     * @param ServiceCRUDOrder $serviceCRUDOrder function
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(ServiceCRUDBasket $serviceBasket, ServiceCRUDOrder $serviceCRUDOrder)
    {
        $userId = Auth::user()->id;
        $basketWithProduct = $serviceBasket->basketWithProduct($userId);
        $serviceCRUDOrder->OrderDestroy($basketWithProduct);
        return redirect()->route('user.catalog');
    }

}
