<?php

namespace App\Providers;

use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Repositories\Category\CategoryRawRepository;
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
