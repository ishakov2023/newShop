<?php

namespace App\Repositories\Category;

use App\Contracts\Repositories\CategoryRepositoryCRUDContract;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryRawRepositoryCRUD implements CategoryRepositoryCRUDContract
{

    public function getAll()
    {
       return DB::select('SELECT * FROM `categories` ');
    }
    public function createCategory(CategoryRequest $categoryRequest)
    {
        $validate = $categoryRequest->validated();
        return DB::insert('insert into categories (name) value (?)',[$validate['nameNew']]);
    }
    public function categoryUpdate(Request $request,$id){
        $name = $request->input('name');
        DB::update('update categories set name = :name where id = :id',[$name,$id]);
//         Category::query()
//            ->where('id', $id)
//            ->update(['name' => $name,
//            ]);
    }
}
