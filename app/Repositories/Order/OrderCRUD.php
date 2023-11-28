<?php

namespace App\Repositories\Order;

use App\Contracts\Repositories\OrderCRUDContract;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;


class OrderCRUD implements OrderCRUDContract
{
    public function readOrder($id, $userId, $count)
    {
        Product::query()
            ->where(['id' => $id])
            ->decrement('amount', $count);

        $bask = Basket::query()
            ->where([
                'product_id' => $id,
                'user_id' => $userId
            ])
            ->get();

        foreach ($bask as $basket) {
            Order::query()
                ->create([
                    'basket_id' => $basket->id,
                    'user_id' => $userId,
                ]);

        }

    }

    public function updateOrder($products, $userId)
    {
        foreach ($products as $product) {
            Product::query()
                ->where(['id' => $product->id])
                ->update(['amount' => 0]);

            $bask = Basket::query()
                ->where([
                    'product_id' => $product->id,
                    'user_id' => $product->user_id
                ])
                ->get();

            foreach ($bask as $basket) {
                $order = Order::query()
                    ->where('basket_id', $basket->id)
                    ->get();
                if ($order->isEmpty()) {
                    Order::query()
                        ->create([
                            'basket_id' => $basket->id,
                            'user_id' => $userId]);

                }

            }
        }
    }

    public function destroyOrder($userId)
    {
        Basket::query()->where(['user_id' => $userId])->delete();
    }
}
