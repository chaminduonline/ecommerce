<?php

namespace App\Providers;

use App\Iface\ItemLinksRepositoryInterface;
use App\Repository\ItemRepository;
use App\Iface\ItemRepositoryInterface;
use App\Iface\ItemVariationRepositoryInterface;
use App\Repository\ImageLinksRepository;
use App\Repository\ItemVariationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
        $this->app->bind(ItemVariationRepositoryInterface::class, ItemVariationRepository::class);
        $this->app->bind(ItemLinksRepositoryInterface::class, ImageLinksRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
