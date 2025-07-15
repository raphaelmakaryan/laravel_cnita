<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->permission === 1) {
            return $next($request);
        } else if (Auth::check() && Auth::user()->permission === 0) {
            return redirect()->route('client.dashboard');
        } else {
            return redirect()->route('authentication');
        }
    }
}
