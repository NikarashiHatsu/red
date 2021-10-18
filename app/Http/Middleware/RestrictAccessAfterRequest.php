<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictAccessAfterRequest
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
        $transaction = $request->user()->transaction;

        abort_if($transaction, 403, 'Akses ke halaman ini setelah mengirimkan pengajuan tidak diperbolehkan.');

        return $next($request);
    }
}
