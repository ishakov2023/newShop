<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryUpdateProduct
{
    public function updateProduct(Request $request,$id)
    {
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $amount = $request->amount;
        DB::table('products')
            ->where('id', $id)
            ->update(['name' => $name,
                'description' => $description,
                'price' => $price,
                'amount'=> $amount,
                ]);
    }
}
