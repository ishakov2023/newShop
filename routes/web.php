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
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatalogController;
use App\Models\User;

Route::view('/', 'home.index')->name('home');
Route::middleware('guest')->group(function ()
{
    Route::get('registration', [RegisterController::class,'index'])->name('registration');
    Route::post('registration', [RegisterController::class,'store'])->name('registration.store');

    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::post('login',[LoginController::class,'store'])->name('login.store');
});


Route::prefix('user')->group(function ()
{
    Route::redirect('/','/user/catalog')->name('user');
    Route::get('catalog',[CatalogController::class,'index'])->name('user.catalog');
    Route::get('catalog/{catalog}',[CatalogController::class,'show'])->name('user.catalog.show');
});

Route::prefix('admin')->group(function ()
{
    Route::get('catalog/create',[CatalogController::class,'create'])->name('catalog.create');
    Route::get('catalog/{catalog}/edit',[CatalogController::class,'edit'])->name('catalog.edit');
    Route::post('catalog',[CatalogController::class,'store'])->name('catalog.store');
    Route::put('catalog/{catalog}',[CatalogController::class,'update'])->name('catalog.update');
    Route::delete('catalog/{catalog}',[CatalogController::class,'delete'])->name('catalog.delete');
});
Route::get('test', function (){
    return User::first()->toJson();
});
