<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class verifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('login.index');
        }
        if (Auth::user()->status == 'inactive') {
            Auth::logout();
            return redirect()->route('register.index')->with('error', 'Your Account has been blocked By Admin');
        }
        if (! Auth::user()->is_verified) {
            return redirect()->route('otp.index')->with('error', 'Please Verify Your Account First');
        } else {
            return $next($request);
        }
    }
}
