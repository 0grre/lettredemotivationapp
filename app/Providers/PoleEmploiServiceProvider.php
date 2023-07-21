<?php

namespace App\Providers;

use App\PoleEmploi\PoleEmploi;
use App\PoleEmploi\PoleEmploiClient;
use Illuminate\Support\ServiceProvider;

class PoleEmploiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(PoleEmploiClient::class, function () {
            return new PoleEmploiClient();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->alias(PoleEmploi::class, 'PoleEmploi');
    }
}
