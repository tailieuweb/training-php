<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Person;
use App\Admin;
use Auth;
use Hash;
//
class AdminController extends Controller
{
    //USER LAYOUT
    // detail profile page
    public function getAdminProfilePage() {
        if(Auth::guard('account_admin')->check()) {
            $admin = Auth::guard('account_admin')->user();
            $person = Person::where('account_id','=',$admin->id)->first();
            return view('admin.profile', compact('person'));
        }
    }
    // edit profile page
    public function getEdit() {
        if(Auth::guard('account_admin')->check()) {
            $account_id = Auth::guard('account_admin')->user()->id;
            $person = Person::where('account_id','=',$account_id)->first();
            return view('admin.profile-edit', compact('person'));
        }
    }
    //post edit profile page
    public function postEdit(Request $request) {
        $this->validate($request,
			[
                'fullname'=>'required',
                'address'=>'required',
                'gender'=> 'required',
                'date'=>'required',
				'email'=>'required|email',
                'phone'=>'required|digits:10'
			],
			[
                'fullname.required'=>'Please enter your full name',
                'address.required'=>'Please enter your address',
                'gender.required'=>'Please enter your gender',
                'date.required'=>'Please enter your date',
				'email.required'=>'Please enter your email',
                'email.email'=>'Incorrect email format',
                'phone.required'=>'Please enter your number phone',
                'phone.digits'=>'Number phone is invalid',
			]
		);
        $subString = substr($request->id, 36, -36);
        $id = base64_decode($subString);
        $person = Person::where(DB::raw('md5(id)'),'=',md5($id))->first();
        if($person == null) {
            return redirect('admin-page/error');
        }
        $tablePerson = Person::where('id','!=',$id)->get();
        $flag = true;
        foreach($tablePerson as $key => $value) {
            if($request->phone == $value->phone || $request->email == $value->email) {
                $flag = false;
                break;
            }
        }
        if($flag == true) {
            $person->full_name = $request->fullname;
            $person->gender = ($request->gender == 1) ? 'Male' : 'Female';
            $person->address = $request->address;
            $person->date_of_birth = $request->date;
            $person->phone = $request->phone;
            $person->email = $request->email;
            $person->save();
            return redirect('admin-page/admin/profile')->with(['typeMsg' => 'success','msg' => 'Edit profile successfully !!!']);
        } else {
            return back()->with(['typeMsg'=>'danger','msg'=>'email or numberphone already exist']);
        }
    }
    // edit password page
    public function getEditAccount() {
        if(Auth::guard('account_admin')->check()) {
            $account = Auth::guard('account_admin')->user();
            return view('admin.account-edit', compact('account'));
        }
    }
    //post edit password page
    public function postEditAccount(Request $request) {
        $this->validate($request,
			[
                'oldpassword'=>'required|min:6|max:20',
                'newpassword'=>'required|min:6|max:20',
                'repassword'=>'required|same:newpassword|min:6|max:20'
			],
			[
                'oldpassword.required'=>'Please enter your old password',
                'newpassword.required'=>'Please enter your new password',
                'repassword.required'=>'Please enter re password',
                'repassword.same'=>'incorrect password',
                'oldpassword.min'=>'Password must be more than 6 characters',
                'oldpassword.max'=>'Password must not exceed 20 characters',
                'newpassword.min'=>'Password must be more than 6 characters',
                'newpassword.max'=>'Password must not exceed 20 characters',
                'repassword.min'=>'Password must be more than 6 characters',
                'repassword.max'=>'Password must not exceed 20 characters',
			]
		);
        $account = Auth::guard('account_admin')->user();
        $user_name = $account->user_name;
        //     
        $data = [
            'user_name' => $user_name,
            'password' => $request->oldpassword,
        ];
        if(Auth::guard('account_admin')->attempt($data)) {
            $account->password = bcrypt($request->newpassword);
            $account->save();
            Auth::guard('account_admin')->logout();
            return redirect('admin-page/login')->with(['typeMsg' => 'success','msg' => 'Change password Successfully !!!']);
        } else {
            return back()->with(['typeMsg' => 'danger','msg' => 'Incorrect old password !!!']);
        }
    }
    //get list admin
    public function getList() {
        if(Auth::guard('account_admin')->check()) {
            $account_id = Auth::guard('account_admin')->user()->id;
        }
        $list_admin = Account::select('accounts.user_name','persons.full_name','admins.role_admin','admins.id as admin_id')->where('accounts.id','!=',$account_id)->join('persons','persons.account_id','=','accounts.id')->join('admins','admins.person_id','=','persons.id')->paginate(5);
        return view('admin.list-admin', compact('list_admin'));
    }
    // post change role admin 
    public function postChange(Request $request) {
        $subString = substr($request->admin_id, 36, -36);
        $admin_id = base64_decode($subString);
        $admin = Admin::where(DB::raw('md5(id)'),'=',md5($admin_id))->first();
        $subString1 = substr($request->role, 36, -36);
        $role = base64_decode($subString1);
        if($admin == null || $role == null) {
            return response()->json(array('typeMsg' => 'danger','msg' => 'Failed action !!!'));
        }
        if($role == 0) {
            $admin->role_admin = "manager";
        }
        else {
            $admin->role_admin = "editer";
        }
        $admin->save();
        return response()->json(array('typeMsg' => 'success','msg' => 'Edit successfully !!!'));
    }
    //get add admin page
    public function getAdd() {
        return view('admin.add-admin');
    }
    //post add admin
    public function postAdd(Request $request) {
        $this->validate($request,
			[
				'user_name'=>'required|unique:accounts',
				'email'=>'required|email|unique:persons',
				'password'=>'required|min:6|max:20',
				'repassword'=>'required|same:password',
                'phone'=>'required|unique:persons|digits:10'
			],
			[
				'user_name.required'=>'Please enter your name',
                'user_name.unique'=>'Username already exists',
				'email.required'=>'Please enter your email',
				'email.unique'=>'This email already exist',
                'email.email'=>'Incorrect email format',
				'password.required'=>'Please enter your password',
				'password.min'=>'Password must be more than 6 characters',
				'password.max'=>'Password must not exceed 20 characters',
				'repassword.same'=>'incorrect password',
                'phone.unique'=>'Number phone already exist',
                'phone.digits'=>'Number phone is invalid',
			]
		);
        // add account
        $account = Account::getInstance();
        $account->user_name = $request->user_name;
        $account->password = bcrypt($request->password);
        $account->role = 'admin';
        $account->save();
        // add person
        $person = Person::getInstance();
        $person->account_id = $account->id;
        $person->full_name = $request->fullname;
        $person->gender = ($request->gender == 1) ? 'Male' : 'Female';
        $person->address = $request->address;
        $person->date_of_birth = $request->date;
        $person->phone = $request->phone;
        $person->email = $request->email;
        $person->save();
        // add admin 
        $admin = Admin::getInstance();
        $admin->person_id = $person->id;
        $admin->role_admin = $request->role;
        $admin->save();
        return redirect('admin-page/admin/list-admin')->with(['typeMsg' => 'success','msg' => 'Add admin successfully !!!']);
    }
    //delete admin, person, account
    public function getDelete($id) {
        $subString = substr($id, 36, -36);
        $id = base64_decode($subString);
        $admin = Admin::where(DB::raw('md5(id)'),'=',md5($id))->first();
        if($admin == null) {
            return redirect('admin-page/error');
        }
        $person_id = $admin->person_id;
        $person = Person::find($person_id);
        $account_id = $person->account_id;
        //
        Admin::destroy($id);
        Person::destroy($person_id);
        Account::destroy($account_id);
    	return redirect(url('admin-page/admin/list-admin'))->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
    }
}
