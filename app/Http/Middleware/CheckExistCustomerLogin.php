<?php

namespace App\Http\Middleware;
use Closure;
use Auth;
use Illuminate\Http\Request;
class CheckExistCustomerLogin
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
        if(Auth::guard('account_customer')->check()) {
            return redirect(url()->previous());
        } else {
            return $next($request);
        }
    }
}
