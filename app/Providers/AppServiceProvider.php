<?php

namespace App\Providers;

use App\Contracts\Repositories\AdminDeleteContract;
use App\Contracts\Repositories\BasketCreateContract;
use App\Contracts\Repositories\BasketRepositoryContract;
use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Contracts\Repositories\CreateCategoryContract;
use App\Contracts\Repositories\DeleteBasketContract;
use App\Contracts\Repositories\ProductCreatContract;
use App\Contracts\Repositories\ProductRepositoryContract;
use App\Contracts\Repositories\UpdateBasketContract;
use App\Contracts\Repositories\UpdateCategoryContract;
use App\Contracts\Repositories\UpdateProductContract;
use App\Repositories\BasketCreate\RepositoryRawCreateBasket;
use App\Repositories\CreateCategory\RepositoryCreateCategory;
use App\Repositories\CreateCategory\RepositoryRawCreateCategory;
use App\Repositories\DeleteBasket\RepositoryRawDeleteBasket;
use App\Repositories\DeleteBasketAndProduct\RepositoryDelProduct;
use App\Repositories\DeleteBasketAndProduct\RepositoryRawDelProduct;
use App\Repositories\Basket\BasketRawRepository;
use App\Repositories\Category\CategoryRawRepository;
use App\Repositories\Product\ProductRawRepository;
use App\Repositories\ProductCreate\RepositoryCreateRawProduct;
use App\Repositories\UpdateBasket\RepositoryRawUpdateBasket;
use App\Repositories\UpdateBasket\RepositoryUpdateBasket;
use App\Repositories\UpdateCategory\RepositoryRawUpdateCategory;
use App\Repositories\UpdateCategory\RepositoryUpdateCategory;
use App\Repositories\UpdateProduct\RepositoryRawUpdateProduct;
use App\Repositories\UpdateProduct\RepositoryUpdateProduct;
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
            return new RepositoryDelProduct();
        });
        $this->app->bind(BasketCreateContract::class,function ($app){
            return new RepositoryRawCreateBasket();
        });
        $this->app->bind(DeleteBasketContract::class,function ($app){
            return new RepositoryRawDeleteBasket();
        });
        $this->app->singleton(CreateCategoryContract::class,function ($app){
            return new RepositoryRawCreateCategory();
        });
        $this->app->bind(UpdateBasketContract::class,function ($app){
            return new RepositoryRawUpdateBasket();
        });
        $this->app->bind(UpdateCategoryContract::class,function ($app){
            return new RepositoryUpdateCategory();
        });
        $this->app->bind(UpdateProductContract::class,function ($app){
            return new RepositoryRawUpdateProduct();
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
