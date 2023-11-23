<?php

namespace App\Providers;

use App\Contracts\Repositories\AdminDeleteContract;
use App\Contracts\Repositories\BasketRepositoryContract;
use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Contracts\Repositories\ProductCreatContract;
use App\Contracts\Repositories\ProductRepositoryContract;
use App\Repositories\AdminDelete\RepositoryAdminDel;
use App\Repositories\AdminDelete\RepositoryRawAdminDel;
use App\Repositories\Basket\BasketRawRepository;
use App\Repositories\Category\CategoryRawRepository;
use App\Repositories\Product\ProductRawRepository;
use App\Repositories\ProductCreate\RepositoryCreateRawProduct;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->singleton(CategoryRepositoryContract::class,function ($app){
           return new CategoryRawRepository();
       });
        $this->app->singleton(ProductRepositoryContract::class,function ($app){
            return new ProductRawRepository();
        });
        $this->app->singleton(BasketRepositoryContract::class,function ($app){
            return new BasketRawRepository();
        });
        $this->app->singleton(ProductCreatContract::class,function ($app){
            return new RepositoryCreateRawProduct();
        });
        $this->app->bind(AdminDeleteContract::class,function ($app){
            return new RepositoryAdminDel();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
