<?php

namespace App\Contracts\Repositories;

use App\Models\Product;

interface AdminDeleteContract
{
   public function productBasketDelete($id): ?Product;
}
