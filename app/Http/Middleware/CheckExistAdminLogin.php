<?php

namespace App\Http\Middleware;
use Auth;
use Illuminate\Http\Request;
use Closure;

class CheckExistAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('account_admin')->check()) {
            return redirect(url()->previous());
        } else {
            return $next($request);
        }
    }
}
