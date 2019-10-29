<?php

namespace App\Providers;

use Cart;

use App\Models\Region;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.header', function ($view) {
            $view->with('regions', Region::orderByRaw('-name ASC')->get()->nest());
        });

        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });

        View::composer('site.pages.region', function ($view) {
            $view->with('regions', Region::orderByRaw('-name ASC')->get()->nest());
        });

        View::composer('site.pages.homepage', function ($view) {
            $view->with('products', Product::orderByRaw('-name ASC')->get());
        });
    }

}
