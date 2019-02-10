<?php

namespace App\Http\Middleware\EmptyCart;

use Closure;
use Cart;

class AuthenticateCart
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
        
        if (Cart::instance('cart')->count() < 1) {
            return redirect('/');
        }
        return $next($request);
    }
}
