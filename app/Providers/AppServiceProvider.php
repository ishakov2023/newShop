<?php

namespace App\Providers;

use App\Contracts\Repositories\AdminDeleteContract;

use App\Contracts\Repositories\BasketRepositoryCRUDContract;
use App\Contracts\Repositories\CategoryRepositoryCRUDContract;
use App\Contracts\Repositories\CreateCategoryContract;

use App\Contracts\Repositories\OrderCRUDContract;
use App\Contracts\Repositories\ProductCreatContract;
use App\Contracts\Repositories\ProductRepositoryCRUDContract;

use App\Contracts\Repositories\UpdateCategoryContract;
use App\Contracts\Repositories\UpdateProductContract;
use App\Models\Order;
use App\Observers\OrderObserver;
use App\Repositories\Basket\RepositoryCRUDBasket;

use App\Repositories\BasketCreate\RepositoryRawCreateBasket;
use App\Repositories\Category\CategoryRepositoryCRUD;
use App\Repositories\CreateCategory\RepositoryCreateCategory;
use App\Repositories\CreateCategory\RepositoryRawCreateCategory;

use App\Repositories\DeleteBasket\RepositoryRawDeleteBasket;
use App\Repositories\DeleteBasketAndProduct\RepositoryDelProduct;
use App\Repositories\DeleteBasketAndProduct\RepositoryRawDelProduct;
use App\Repositories\Basket\BasketRawRepositoryCRUD;
use App\Repositories\Category\CategoryRawRepositoryCRUD;
use App\Repositories\Order\OrderCRUD;
use App\Repositories\Product\ProductRawRepositoryCRUD;
use App\Repositories\Product\ProductRepositoryCRUD;
use App\Repositories\ProductCreate\RepositoryCreateRawProduct;
use App\Repositories\UpdateBasket\RepositoryRawUpdateBasket;

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
       $this->app->singleton(CategoryRepositoryCRUDContract::class,function ($app){
           return new CategoryRepositoryCRUD();
       });
        $this->app->singleton(ProductRepositoryCRUDContract::class,function ($app){
            return new ProductRepositoryCRUD();
        });
        $this->app->singleton(BasketRepositoryCRUDContract::class,function ($app){
            return new RepositoryCRUDBasket();
//            return new BasketRawRepositoryCRUD();
        });

        $this->app->bind(AdminDeleteContract::class,function ($app){
            return new RepositoryDelProduct();
        });

        $this->app->bind(OrderCRUDContract::class,function ($app){
            return new OrderCRUD();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
    }
}
