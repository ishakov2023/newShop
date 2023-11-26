<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface UpdateProductContract
{
    public function updateProduct(Request $request,$id);
}
