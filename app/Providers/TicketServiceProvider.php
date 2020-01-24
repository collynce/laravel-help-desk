<?php

namespace App\Providers;

use App\Interfaces\TicketsInterface;
use App\Repositories\TicketsRepository;
use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TicketsInterface::class,
            TicketsRepository::class
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
