<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

// use Gloudemans\Shoppingcart\Facades\Cart;
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
        $menu=Menu::get();
        // $cart= Cart::content();
        // view()->composer(
        //     'inc.header', 
        //     function ($view) {
        //         $view->with('menus', $menu);
        //     }
        // );
        View::share('menus',$menu );
        // View::share('carts'.$cart);
    }
}
