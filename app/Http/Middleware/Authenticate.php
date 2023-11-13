<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if ($request->is('admin/*')) {
            if (!Auth::guard('admin')->check()) {
                return route('admin.login');
            }
        }
        else if (!Auth::guard('web')->check()) {
            return route('user.login');
        }
    }
}
