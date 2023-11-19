<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepositoryUpdateCategory
{
    public function categoryUpdate(Request $request,$id){
        $name = $request->input('name');
         DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $name,
            ]);
    }
}
