<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Serves\ServiceBasket;
use App\Serves\ServiceCRUDOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(ServiceBasket $serviceBasket, ServiceCRUDOrder $serviceCRUDOrder)
    {
        $userId = Auth::user()->id;
        $products = $serviceBasket->productIsBasket($userId);// переделать
        foreach ($products as $product) {
            if ($product->count <= $product->amount) {
                $serviceCRUDOrder->OrderRead($product->id, $product->user_id, $product->count);
            } else {
                $products = DB::select('SELECT * FROM `baskets` JOIN `products` ON `baskets`.product_id= `products`.`id` WHERE `baskets`.`user_id`= ? and `products`.`amount`>0', [$userId]);
                Basket::query()->where(['product_id' => $product->id, 'user_id' => $product->user_id])->update(['count' => $product->amount]);
                return view('buy.buy', compact('products'));
            }
        }
        return 'Покупка успешно оформленна';
    }

    public function update(ServiceBasket $serviceBasket, $id, ServiceCRUDOrder $serviceCRUDOrder)
    {
        $userId = Auth::user()->id;
        $products = $serviceBasket->productIsBasket($userId);
        $serviceCRUDOrder->OrderUpdate($products, $userId);
        return 'Покупка успешно оформленна';
    }

    public function delete($id, ServiceCRUDOrder $serviceCRUDOrder)
    {
        $userId = Auth::user()->id;
        $serviceCRUDOrder->OrderDestroy($userId);
        return redirect()->route('user.catalog');
    }

}
