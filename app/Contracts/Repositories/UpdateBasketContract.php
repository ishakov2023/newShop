<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface UpdateBasketContract
{
  public function updateBasketIsButton(Request $request,$productId,$userId);
}
