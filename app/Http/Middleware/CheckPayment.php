<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckPayment extends Middleware
{


    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->level() < 5 && (!$request->user()->subscribed('default') || ($request->user()->subscription() == null ? true : $request->user()->subscription()->canceled()))) {
            // This user is not a paying customer...
            return redirect(route('payment.subscribe'));
        }

        return $next($request);
    }
}
