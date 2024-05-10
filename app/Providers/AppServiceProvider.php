<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('global', function (Request $request) {
            return Limit::perMinute(100);
        });

        seo()->site('Exemple de lettre de motivation — LettreDeMotivation.app')
            ->title(
                default: 'Lettre De Motivation — Générateur de lettre de motivation en ligne',
                modify: fn (string $title) => $title . ' | LettreDeMotivation.app'
            )
            ->image(default: fn () => asset('bg.jpeg'));
    }
}
