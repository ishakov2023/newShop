<?php

namespace App\Repositories\UpdateCategory;

use App\Contracts\Repositories\UpdateCategoryContract;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryUpdateCategory implements UpdateCategoryContract
{
    public function categoryUpdate(Request $request,$id){
        $name = $request->input('name');
         Category::query()
            ->where('id', $id)
            ->update(['name' => $name,
            ]);
    }
}
