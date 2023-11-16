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
use App\Http\Controllers\AdminProductController;
Route::middleware('adminGuest')->group(function (){
Route::get('admin',[AdminController::class ,'index'])->name('admin');
Route::post('admin',[AdminController::class ,'login'])->name('admin.login');
});
Route::prefix('admin')->middleware(['auth','admin'])->group(function ()
{
    Route::redirect('/admin','/admin/admin')->name('adminRed');
    Route::get('admin',[AdminProductController::class,'index'])->name('admin.index');
    Route::get('admin/create',[AdminProductController::class,'create'])->name('admin.create');
    Route::get('admin/{catalog}/edit',[AdminProductController::class,'edit'])->name('admin.edit');
    Route::post('admin',[AdminProductController::class,'store'])->name('admin.store');
    Route::put('admin/{catalog}',[AdminProductController::class,'update'])->name('admin.update');
    Route::delete('admin/{catalog}',[AdminProductController::class,'delete'])->name('admin.delete');
});
Route::post('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
