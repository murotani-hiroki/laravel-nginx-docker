<?php

namespace App\Providers;

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
        $this->app->singleton(\App\Service\TradeRepository::class, \App\Repositories\TradeRepository::class);
        $this->app->singleton(\App\Service\CurrencyPairRepository::class, \App\Repositories\CurrencyPairRepository::class);
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
