<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Location;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('app.home');
        // return ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /* Nhận dữ liệu và xử lí validate */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required|min:4|confirmed',
        ]);
        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'username'    => $request->input('username'),
            'password'    => md5($request->input('password')),
            'password_confirmation'    => md5($request->input('password_confirmation')),
            'version' => $request->input('version'),
        ]);
        return response([
            'users' => $user
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Cập nhật User theo id
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $ver = $user['version'];
        $verNew = $request->input('version');
        if($ver == $verNew){
            $name = $request->input('name');
            $user_name = $request->input('username');
            $email =  $request->input('email');
            $pass =  $request->input('password');
            $version = $request->input('version')+1;

            DB::update('update users set name = ?, username = ?, email = ?, password = ?, password_confirmation = ?, version = ? where id = ?',
            [$name,$user_name, $email,md5($pass), md5($pass),$version,$id]);
            $request->session()->flash('statusTrue', 'Update successful!');
        }
        else{
            $request->session()->flash('statusFalse', 'Update failed due to modified data!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::find($id);
        if(!$user){
            $request->session()->flash('statusFalse', 'Delete failed due to modified data!!!');
        }
        else{
            $user->delete();
            $request->session()->flash('statusTrue', 'Delete successful!');
        }

        return response()->json(" successfully deleted ");
    }

    /**
    * @param string $email
    * @param string $password
    */
    //function login
    public function login(Request $req){
        //Thực hiện lấy request và truy vấn cho đăng nhập, trả về json
        $query = User::whereRaw('BINARY email = ? AND BINARY password = ?',[$req->email
        ,md5($req->password)])->get();
       return $query;
    }
}

