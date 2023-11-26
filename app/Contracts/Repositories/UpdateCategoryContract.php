<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface UpdateCategoryContract
{
    public function categoryUpdate(Request $request,$id);
}
