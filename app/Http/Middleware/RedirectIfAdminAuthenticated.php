<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdminAuthenticated
{
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->check()) {
            // If the admin is authenticated, redirect to the admin dashboard or any other route
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
