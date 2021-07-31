<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSuperMiddleware
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
        if (!auth('super')->check()) {
            return redirect()
                ->route('super.auth.login')
                ->with('msg:error', 'Please Login !');
        }
        return $next($request);
    }
}
