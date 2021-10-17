<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasPricingPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->formOrder?->pricing_plan_id) {
            return $next($request);
        } else {
            abort(401, 'Anda belum memilih paket harga.');
        }
    }
}
