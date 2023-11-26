<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface DeleteBasketContract
{
    public function basketDestroy(Request $request,$id,$userId);
}
