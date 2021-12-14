<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TwoFactor
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
        $twoFactorCode = $request->exists('12345');

        if ($twoFactorCode) {
            return $next($request);
        } else {
            return response("This page requires two factor authentication");
        }
        return $next($request);
    }
}
