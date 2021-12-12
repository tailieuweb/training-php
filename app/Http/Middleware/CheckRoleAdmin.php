<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App\Account;
use App\Person;
use App\Admin;

class CheckRoleAdmin
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
        //get type customer
        if(Auth::guard('account_admin')->check()) {
            $account_id = Auth::guard('account_admin')->user()->id;
            $person = Person::where('account_id','=',$account_id)->first();
            $admin = Admin::where('person_id','=',$person->id)->first();
            if($admin->role_admin == 'manager'){
                return $next($request);
            } else {
                return redirect(url()->previous())->with(['typeMsg' => 'danger','msg' => 'You dont have permission to access !!!']);
            }
        }    
    }
}
