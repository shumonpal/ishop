<?php

namespace App\Http\Middleware\Customer;

use Closure;

class RedirectIfAuthenticated
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
        if (Auth::guard('customer_guard')->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
