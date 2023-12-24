<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('navbar.blade.php', function ($view) {
            $itemCount = session('cart', []) ? array_sum(array_column(session('cart'), 'quantity')) : 0;
            $view->with('itemCount', $itemCount);
        });
    }
}
