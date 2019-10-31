<?php

namespace App\Providers;

use Cart;

use App\Models\Region;
use App\Models\Package;
use App\Models\PackageImage;
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
            $view->with('packages', Package::orderByRaw('-name ASC')->get());
        });

        View::composer('site.pages.homepage', function ($view) {
            $view->with('regionfeat', Region::orderByRaw('-name ASC')->get());
        });
    }

}
