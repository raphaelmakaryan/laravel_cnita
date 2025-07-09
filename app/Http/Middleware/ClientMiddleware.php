<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->permission === 0) {
            return $next($request);
        } else if (Auth::check() && Auth::user()->permission === 1) {
            return redirect()->route('backoffice.products'); // ou abort(403);
        } else if (!Auth::check()) {
            return redirect()->route('authentication'); // ou abort(403);
        }
    }
}
