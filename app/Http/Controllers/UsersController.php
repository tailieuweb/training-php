<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function getAllUser()
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $user = DB::table("users_web")
            // ->join('protypes', 'protypes.id', '=', 'products.type_id')
            // ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
             ->select('users_web.*');
        $user = $user->orderBy("users_web.id", "Desc");

        $user = $user->paginate(15);
        return view('backend.layouts.Users.AllUser')->with('user', $user);
    }
    public function AddUser(Request $request)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        // $manu =  DB::table("manufactures")->orderBy("id", "desc")->get();
        // $type =  DB::table("protypes")->orderBy("id", "desc")->get();
        // $gender =  DB::table("genders")->orderBy("id", "desc")->get();
        return view('backend.layouts.Users.addUser');
    }
    public function getSaveUser(Request $request)
    
    {

        $this->validate($request, [
            "email" => "required|email",

            "password" => "required",
            "re-password" =>"same:password",

        ], [
            "email.required" => "Vui lòng nhập email",

            "password.required" => "Vui lòng nhập mật khẩu",
            "re-password.same" => "Mật khẩu không khớp"

        ]);
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $checkemail = DB::table('users_web')->where('email',$request->email)->first();
        if($checkemail == null){
            $data = array();
            $data['username'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make(($request->password));
            $data['role'] = 0;
            $data['very_email'] = 0;
            DB::table('users_web')->insert($data);
            return Redirect::to('/users')->with([ "message" => "Thêm thành công!"]);;
    
        }
       
        return Redirect::to('/users')->with([ "message" => "Thêm Thất bại!"]);;
    }
    public function EditUser($id)
    {
       
        $id = substr($id,9);
        $user =  DB::table("users_web")->where('id', $id)->get();
        return view('backend.layouts.Users.editUser')->with('user', $user);
    }
    public function UpdateUser(Request $request, $id)
    {
        $this->validate($request, [
            "email" => "required|email",

            "password" => "required",
            "re-password" =>"same:password",

        ], [
            "email.required" => "Vui lòng nhập email",

            "password.required" => "Vui lòng nhập mật khẩu",
            "re-password.same" => "Mật khẩu không khớp"

        ]);
        $checkemail = DB::table('users_web')->where('email',$request->email)->first();
        if($checkemail == null){
        $data = array();
        $data['username'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        DB::table('users_web')->where('id', $id)->update($data);
        return Redirect::to('/users')->with(["message" => "Cập Nhập thành công!"]);
        }
       

        return Redirect::to('/users')->with(["message" => "Cập Nhập thất bại!"]);
    }
    public function DeleteUser($id)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $key = substr($id,0,9);
        $id = substr($id,9);
        
        DB::table('users_web')->where('id', $id)->delete();

        
        return Redirect::to('/users')->with([ "message" => "Delete thành công!"]);
    }
    public function getFavorite()
    {
       
      
      
        return view('frontend.layout.favorite.index');
    }
}
