<?php

namespace App\Repositories\UpdateProduct;

use App\Contracts\Repositories\UpdateProductContract;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryRawUpdateProduct implements UpdateProductContract
{
    public function updateProduct(Request $request,$id)
    {
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $amount = $request->amount;
        DB::update('update products set name = :name, description = :description,price = :price,amount = :amount where id = :id',[$name,$description,$price,$amount,$id]);
    }
}
