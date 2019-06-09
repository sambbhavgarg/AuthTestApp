<?php

namespace AuthTestApp\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use AuthTestApp\Services\Twitter;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
          \AuthTestApp\Repositories\UserRepository::class,
          \AuthTestApp\Repositories\DbUserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
     {
         Schema::defaultStringLength(191); //insert this line also
     }
}
