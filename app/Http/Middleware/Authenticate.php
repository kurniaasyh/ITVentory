<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Tentukan ke mana harus redirect kalau user belum login.
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        return null;
    }
}
