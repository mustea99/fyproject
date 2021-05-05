<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthStudentMiddleware
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
        if (!auth('student')->check()) {
            return redirect()
                ->route('student.auth.login')
                ->with('msg:error', 'Please Login !');
        }

        return $next($request);
    }
}