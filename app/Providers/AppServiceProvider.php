<?php

namespace App\Providers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        Inertia::share([
            'errors' => function(){
                return session()->get('errors')
                ? session()->get('errors')->getBag('default')->getMessages()
                :(object)[];
            },

        ]);
        Inertia::share('flash', function(){
            return [
              'message'=> session()->get('message')
            ];
        });
        Inertia::share('csrf_token',function(){
            return csrf_token();
        });
    }
}
