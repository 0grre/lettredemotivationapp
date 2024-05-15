<?php

namespace App\Http\Middleware;

use Closure;

class RedirectLettreDeMotivation
{
    public function handle($request, Closure $next)
    {
        if ($request->is('lettredemotivation.fly.dev')) {
            return redirect('https://lettredemotivation.app');
        }

        return $next($request);
    }
}

