<?php

namespace App\Repositories\UpdateProduct;

use App\Contracts\Repositories\UpdateProductContract;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryUpdateProduct implements UpdateProductContract
{
    public function updateProduct(Request $request,$id)
    {
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $amount = $request->amount;
        Product::query()
            ->where('id', $id)
            ->update(['name' => $name,
                'description' => $description,
                'price' => $price,
                'amount'=> $amount,
                ]);
    }
}
