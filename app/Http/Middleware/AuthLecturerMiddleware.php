<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthLecturerMiddleware
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
        if (!auth('lecturer')->check()) {
            return redirect()
                ->route('lecturer.auth.login')
                ->with('msg:error', 'Please Login !');
        }
        return $next($request);
    }
}
