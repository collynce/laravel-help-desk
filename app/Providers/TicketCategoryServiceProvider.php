<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Repositories\TicketsCategoryRepository;
use Illuminate\Support\ServiceProvider;

class TicketCategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryInterface::class,
            TicketsCategoryRepository::class
        );
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
