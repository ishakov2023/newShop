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
use App\Http\Controllers\BasketController;

Route::view('/', 'home.index')->name('home');
Route::middleware('guest')->group(function ()
{
    Route::get('registration', [RegisterController::class,'index'])->name('registration');
    Route::post('registration', [RegisterController::class,'store'])->name('registration.store');

    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::post('login',[LoginController::class,'login'])->name('login.login');
});
Route::post('logout',[LoginController::class,'logout'])->name('login.logout');

Route::prefix('user')->middleware(['auth','user'])->group(function ()
{
    Route::redirect('/','/user/catalog')->name('user');
    Route::get('catalog',[CatalogController::class,'index'])->name('user.catalog');
    Route::get('catalog/{catalog}',[CatalogController::class,'show'])->name('user.catalog.show');

    Route::get('basket',[BasketController::class,'index'])->name('basket');
    Route::get('basket/create',[BasketController::class,'create'])->name('basket.create');
    Route::put('basket/{id}',[BasketController::class,'update'])->name('basket.update');
    Route::delete('basket/{id}',[BasketController::class,'delete'])->name('basket.delete');
});

