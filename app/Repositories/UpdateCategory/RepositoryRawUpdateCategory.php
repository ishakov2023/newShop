<?php

namespace App\Repositories\UpdateCategory;

use App\Contracts\Repositories\UpdateCategoryContract;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryRawUpdateCategory implements UpdateCategoryContract
{
    public function categoryUpdate(Request $request,$id){
        $name = $request->input('name');
        DB::update('update categories set name = :name where id = :id',[$name,$id]);
//         Category::query()
//            ->where('id', $id)
//            ->update(['name' => $name,
//            ]);
    }
}
