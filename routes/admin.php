<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCatalogController;
Route::middleware('guest')->group(function (){
Route::get('admin',[AdminController::class ,'index'])->name('admin');
Route::post('admin',[AdminController::class ,'login'])->name('admin.login');
});
Route::prefix('admin')->middleware('admin')->group(function ()
{
    Route::get('admin',[AdminCatalogController::class,'index'])->name('admin.index');
    Route::get('admin/create',[AdminCatalogController::class,'create'])->name('admin.create');
    Route::get('admin/{catalog}/edit',[AdminCatalogController::class,'edit'])->name('admin.edit');
    Route::post('admin',[AdminCatalogController::class,'store'])->name('admin.store');
    Route::put('admin/{catalog}',[AdminCatalogController::class,'update'])->name('admin.update');
    Route::delete('admin/{catalog}',[AdminCatalogController::class,'delete'])->name('admin.delete');
});
Route::post('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
