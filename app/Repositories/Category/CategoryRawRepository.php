<?php

namespace App\Repositories\Category;

use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRawRepository implements CategoryRepositoryContract
{

    public function getAll()
    {
       return DB::select('SELECT * FROM `categories` ');
    }
}
