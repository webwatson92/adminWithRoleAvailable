<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\HomeComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        setlocale(LC_TIME, config('app.locale'));

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role === 'ADM';
        });

       Blade::if('user', function () {
            return auth()->check() && auth()->user()->role === 'USR';
        });

        View::composer([
            'layouts.base'
          ], HomeComposer::class);

    }
}
