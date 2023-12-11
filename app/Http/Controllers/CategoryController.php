<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Serves\CategoryServiceCRUD;
use App\Serves\ServesCreateCategory;
use App\Serves\ServesUpdateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(CategoryServiceCRUD $categoryService){
        $categories = $categoryService->getAllCategory();
        $user = Auth::user();
        return view('admin/category',compact('categories','user'));
    }
    public function store(CategoryRequest $request, CategoryServiceCRUD $categoryService){
        $categoryService->createCategoryDB($request);
        return redirect()->back();
    }
    public function update(Request $request,CategoryServiceCRUD $categoryService,$id){
        $categoryService->updateCategory($request,$id);
        return redirect()->back();
    }
    public function delete($id){
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->back();
    }
}
