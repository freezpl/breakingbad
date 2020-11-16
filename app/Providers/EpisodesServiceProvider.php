<?php

namespace App\Providers;

use App\Services\EpisodesService;
use Illuminate\Support\ServiceProvider;

class EpisodesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Services\Contracts\IEpisodesService',
            'App\Services\EpisodesService'
        );
    }
}
