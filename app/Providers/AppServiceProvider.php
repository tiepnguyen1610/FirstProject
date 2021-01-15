<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Cart;

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
        view()->composer('*', function($view){
            
            $categories = Category::all();
            $view->with('categories',$categories);
        });
        view()->composer('frontend.layout.header', function($view){
            
            $cart = new Cart();
            $view->with('cart',$cart);
        });
    }
}
