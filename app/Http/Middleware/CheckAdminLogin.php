<?php

namespace App\Http\Middleware;
use Auth;
use Illuminate\Http\Request;
use Closure;

class CheckAdminLogin
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
            $account_admin = Auth::guard('account_admin')->user();
            if($account_admin->role == 'admin'){
                return $next($request);
            }
            else{
                Auth::guard('account_admin')->logout();
                // return response()->view('admin.login');
                return redirect('admin-page/login')->with(['typeMsg' => 'danger','msg' => 'You are not admin, please login at Shopping page !!!']);
            }
        } else {
            return response()->view('admin.login');
        }
    }
}
