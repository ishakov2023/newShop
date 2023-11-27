<?php

namespace App\Repositories\BasketCreate;

use App\Contracts\Repositories\BasketCreateContract;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class RepositoryRawCreateBasket implements BasketCreateContract
{
    public function selectBasket($productId,$userId){
        $bask = DB::select('Select * from baskets where product_id = ? and user_id = ? ',[$productId,$userId]);
        $product = DB::select('Select * from products where id = ?  ',[$productId]);

        $products = null;
        foreach ($product as $value){
            $products=$value->amount;
        }
        if (empty($bask) && $products>0){
            return Basket::query()->create([
                'product_id' => $productId,
                'user_id' => $userId,
                'count' => '1',
            ]);
        }
    }
}
