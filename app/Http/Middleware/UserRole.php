<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $check = false;
        if (Auth::check()) {
            if (strtolower(Auth::user()->role) == strtolower($role)) $check = true;
            else {
                abort(404);
                return;
            }
        }
        if ($check) {
            if (Auth::user()->status == 1) return $next($request);
            else return redirect()->route('logout');
        } else
            return redirect()->guest('/');
    }
}
