<?php

namespace App\Providers;

use App\Support\Storage\SessionStorage;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(StoreageInterface::class ,function ($app){
                return new SessionStorage('cart');
        });
    }
}
