<?php

namespace App\Http\Middleware\Admin;

use Closure;

class RedirectIfAuthenticatedAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin_guard')->check()) {
            return redirect('/admin');
        }
        return $next($request);
    }
}
