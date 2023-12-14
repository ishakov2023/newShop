<?php

namespace App\Observers;

use App\Exceptions\OrderCreateException;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param \App\Models\Order $order
     * @return void
     * @throws OrderCreateException
     */
    public function creating(Order $order)
    {
        $product = $order->basketProduct->product;
        $basket = $order->basketProduct;
        if ($product->amount >= $basket->count) {
            Product::query()->where('id',$product->id)->decrement('amount',$basket->count);
            BasketProduct::query()->where('id',$basket->id)->delete();
        }else{
            throw new OrderCreateException();
        }

    }

    /**
     * Handle the order "updated" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
