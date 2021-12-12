<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Person;
use App\Customer;
use Auth;
use Hash;

class AccountController extends Controller
{
    // CUSTOMER
    public function getLoginCustomer() {
        return view('customer.login');
    }
    public function postLoginCustomer(Request $request) {
        $this->validate($request,
			[
				'username'=>'required',
				'password'=>'required|min:6|max:20'
			],
			[
				'username.required'=>'Please enter your username',
				'password.required'=>'Please enter password',
				'password.min'=>'Password must be more than 6 characters',
				'password.max'=>'Password must not exceed 20 characters'
			]
		);
        $account = Account::where('user_name','=',$request->username)->first();
        $data = [
            'user_name' => $request->username,
            'password' => $request->password,
        ];
        if(Auth::guard('account_customer')->attempt($data)) {
            if($account->role == "customer") {
                $person = Person::where('account_id','=',$account->id)->first();
                $customer = Customer::where('person_id','=',$person->id)->first();
                if($customer->status == 0) {
                    Auth::guard('account_customer')->logout();
                    return back()->with(['typeMsg' => 'danger','msg' => 'Your account has not been activated, please verify it in your email !!!']);
                }
                return redirect('home');
            }
            else {
                return back()->with(['typeMsg' => 'danger','msg' => 'You are not customer, please login at Admin page !!!']);
            }
        }
        else {
            return back()->with(['typeMsg' => 'danger','msg' => 'Login failed !!!']);
        }    
    }
    public function logoutCustomer()
	{
		Auth::guard('account_customer')->logout();
		return redirect('login-page')->with(['typeMsg' => 'success','msg' => 'Logout Successfully !!!']);
	}
    // ADMIN
    //
    public function getLoginAdmin() {
        return view('admin.login');
    }
    public function postLoginAdmin(Request $request) {
        $this->validate($request,
			[
				'username'=>'required',
				'password'=>'required|min:6|max:20'
			],
			[
				'username.required'=>'Please enter your username',
				'password.required'=>'Please enter password',
				'password.min'=>'Password must be more than 6 characters',
				'password.max'=>'Password must not exceed 20 characters'
			]
		);
        $data = [
            'user_name' => $request->username,
            'password' => $request->password,
        ];
        if(Auth::guard('account_admin')->attempt($data)) {
            return redirect('admin-page/home');
        }
        else {
            return back()->with(['typeMsg' => 'danger','msg' => 'Login failed !!!']);
        }
    }
    public function logoutAdmin()
	{
		Auth::guard('account_admin')->logout();
		return redirect('admin-page/login')->with(['typeMsg' => 'success','msg' => 'Logout Successfully !!!']);
	}
}
