<?php

namespace App\Http\Middleware;
use Auth;
use Illuminate\Http\Request;
use Closure;

class CheckCustomerLogin
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
            $account_customer = Auth::guard('account_customer')->user();
            if($account_customer->role == 'customer'){
                return $next($request);
            }
            else{
                Auth::guard('account_customer')->logout();
                return redirect('login-page')->with(['typeMsg' => 'danger','msg' => 'You are not customer, please login at Shopping page !!!']);
            }
        } else {
            return response()->view('customer.login');
        }
    }
}
