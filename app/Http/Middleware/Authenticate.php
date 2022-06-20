<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (Auth::check()) {
            $disabled = Auth::user()->disabled;
            if ($disabled == 1) {
                return route('Admin.auth.warning');
            }
        }
            // return route('Admin.auth.warning');

        if (! $request->expectsJson()) {
            return route('Admin.auth.login');
        }

    }
}
