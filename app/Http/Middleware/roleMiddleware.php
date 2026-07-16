<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class roleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  <- Dynamic runtime role verification parameter
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Global safety net if prior auth layer fails
        if (!Auth::check()) {
            return redirect()->route('login.index');
        }

        // Match the user's role method against the requested group value
        if (Auth::user()->role !== $role) {
            // Drop a standard 403 Forbidden page if they try to access another dashboard
            abort(403, 'Unauthorized access to this dashboard zone.');
        }

        return $next($request);
    }
}
