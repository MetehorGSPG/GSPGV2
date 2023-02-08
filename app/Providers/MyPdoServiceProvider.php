<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class MyPdoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
   /* public function boot()
    {
        //
    }*/

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('mypdogspg', function () {
            return new \App\MyApp\PdoGspg;
        });
    }
}
