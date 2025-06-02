<?php

namespace App\Http\Middleware;

use Closure;

class BronzeMember
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
        if ($request->user() && $request->user()->level() < 3) {
             return redirect(route('payment.subscribe'));
        }
        return $next($request);
    }
}
