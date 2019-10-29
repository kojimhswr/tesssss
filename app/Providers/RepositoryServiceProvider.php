<?php

namespace App\Providers;

use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;
use App\Contracts\RegionContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RegionRepository;
use App\Contracts\AttributeContract;
use App\Repositories\AttributeRepository;
use App\Contracts\ShipContract;
use App\Repositories\ShipRepository;
use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        RegionContract::class         =>          RegionRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        ShipContract::class            =>          ShipRepository::class,
        ProductContract::class          =>          ProductRepository::class,
        OrderContract::class            =>          OrderRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
