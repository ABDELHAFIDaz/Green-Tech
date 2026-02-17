<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // you can register classes in here so that you do not have to do (new className) each you call it

        // example:

        // $this->app->bind(className::class, function($app){
        //     return new className();
        // });
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("adminAccess", function($user){
            return $user->role === 'admin';
        });

        Gate::define("clientAccess", function($user){
            return $user->role === 'client';
        });
    }
}
