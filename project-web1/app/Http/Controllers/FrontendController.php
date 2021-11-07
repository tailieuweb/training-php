<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Users_web;

use Illuminate\Support\Facades\Redirect;


class FrontendController extends Controller
{
    public function AuthLogin()
    {
      
        
     
        
        if (Auth::check()) {
            $admin_role = Auth::user()->role;
            if ($admin_role == '1') {
             
                return Redirect::to('/dashboard')->send();
            } else {
                return Redirect::to('/');
            }
        } else {
            return Redirect::to('/logout/user');
        }
    }
    public function getLogin(){
        
        if( Auth::check()){
            $admin_role = Auth::user()->role;
            if ($admin_role == '1') {
               
                return Redirect::to('/dashboard');
            } else {
                return Redirect::to('/');
            }
        };
        return View('Frontend.layout.login.login');
    }
    public function getProfile(){
        
        
        return View('Frontend.layout.Account.profile');
    }
    public function postLogin(Request $request){
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
       
        // $check = DB::table('users_web')
        // ->where('username','=',$request['username'])
        // ->where('password','=',md5($request['password']))->first();        
        if(Auth::attempt(['email' =>  $request->email, 'password' => $request->password]))
        {
            $admin_role = Auth::user()->role;
            $very = Auth::user()->very_email;
            if ($admin_role == '1') {
               
                return Redirect::to('/dashboard');
            } else {
                if( $very == 1)
                {
                    return Redirect::to('/');
                }
                else{
                    Auth::logout();
                    return Redirect::route('frontend.login.index');
                }
               
            }
        }
        else{
            return Redirect::route('frontend.login.index');
        }

       
    }
    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/login/user');
        }
        return  redirect('/login/user');

    }
    public function getRegister(){

        return View('Frontend.layout.login.register');
    }
    public function postRegister(Request $request){
        $request = $request->all();
        $titlename = "Đăng ký tài khoản";
        $checkEmail = DB::table('users_web')->where('email',$request['email'])->first();
        if ($checkEmail) {
            session()->flash('message', 'Tạo tài khoản thất bại');
            return redirect()->route("frontend.login.index");
        } else {
            $token_random = Str::random();
            $data = array();
            $data['username'] = $request['username'];
            $data['email'] = $request['email'];
            $data['password'] = Hash::make($request['password']);
            $data['very_email'] = 0;
            $data['role'] = 0;
            //$data['token'] = $request['token'];
            DB::table('users_web')->insert($data);
            $check = DB::table('users_web')->where('email',$request['email'])->first();
            //send mail
            $email =  $check->email;

            $link_register = url('/registerpassword?email=' . $email . '&token=' . $token_random);

            $data = array("username" => $check->username, "linkreset" => $link_register, 'email' => $check->email);

            Mail::send("frontend.layout.Mail.registerMail", ['data' => $data], function ($message) use ($titlename, $data) {

                $message->to($data['email']);
                $message->subject($titlename);
                $message->from($data['email'], $titlename);
            });
            session()->flash('message', 'Bạn cần xác nhận email để đăng ký thành công');
            return redirect()->route("frontend.login.index");
        }

       

        return Redirect::to('/login/user');

        //return View('Frontend.layout.login.register');
    }
    public function register_accuracy(Request $request){

        $email = $_GET['email'];
        $data = array();
        $data['very_email'] = 1;
        DB::table('users_web')->where('email',$email)->update($data);
        session()->flash('message', 'Xác thực thành công');
        return redirect()->route("frontend.login.index");
    }
    
    public function getIndex()
    {
        $this->AuthLogin();
        return View('Frontend.layout.index');
    } 
    public function getAllHotel()
    {
        $this->AuthLogin();
        $all_hotel = DB::table('hotel')
        ->join('location','location.location_id','=','hotel.location')
        ->select('hotel.*','location.*');
       
        $all_hotel = $all_hotel->orderBy("hotel.hotel_id","DESC");
        $all_hotel = $all_hotel->paginate(15);

        // $rating_number = $this->getRatingHotelId();
        
        return View('Frontend.layout.hotel.all-hotel')->with('all_hotel',$all_hotel);
    } 
    public function getDetailHotel($id)
    {
        $id = substr($id,9);
        $this->AuthLogin();
        $all_hotel = DB::table('hotel')
        ->join('location','location.location_id','=','hotel.location')
        ->where('hotel.hotel_id',$id)
        ->get();
        $rating_number = $this->getRatingHotelId($id);
        return View('Frontend.layout.hotel.detail',compact('all_hotel','rating_number'));
    } 
    public function getRatingHotelId($id)
    {
        $this->AuthLogin();
        $total_rating = 0; 
       
        $rating = DB::table('hotel')
        ->join('rating','rating.hotel_id','=','hotel.hotel_id')
        ->where('hotel.hotel_id',$id)->get();
        $count = $rating->count();
        foreach($rating as $value)
        {
            $total_rating += $value->number_rating;

        }
        if($count != 0){
            $rating_hotel = ceil($total_rating/$count);
        }
        else{
            $rating_hotel =0;
        }
       
        return $rating_hotel;

        return view('frontend.layout.index');
    } 

    /**
     * Show hotel in option -- Home --
     */
    public function rentalHotelOption(Request $request){
        $this->AuthLogin();
        $hotel = DB::table('hotel')
        ->join('location','location.location_id','=','hotel.location')
        ->select('hotel.*','location.*')
        ->where('person', $request->person)->get();

        return view('frontend.layout.details')->with('hotel_search', $hotel);

    }

    function postSearchAjax(Request $request)
    {
        $this->AuthLogin();
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('hotel')
                ->where('name', 'LIKE', "%{$query}%")->orWhere('hotel_info', 'LIKE', "%{$query}%")
                ->get();
            // $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output = '
                <option value="'.$row->name.'">'.$row->hotel_info.'</option>';
            }
            echo $output;
        }
    }
    public function getAllHotelSearch(Request $request)
    {
        $this->AuthLogin();
        $query = "";
         if ($request->get('query')) {
            $query = $request->get('query');
        }
        
        $all_hotel = DB::table('hotel')
        ->join('location','location.location_id','=','hotel.location')
        ->select('hotel.*','location.*')
        ->where('name', 'LIKE', "%{$query}%") ->get();

        return View('Frontend.layout.hotel.all-hotel-search')->with('all_hotel',$all_hotel);
    } 


    /**
     * Payment hotel by id
     */
    public function paymentHotelById($id){
        $id = substr($id,9);
        $this->AuthLogin();
        $hotel = DB::table('hotel')
        ->join('location','location.location_id','=','hotel.location')
        ->select('hotel.*','location.*')
        ->where('hotel_id', $id)->get();

        return view('frontend.layout.payment')->with('hotel', $hotel);
    }
    public function payment_succsess($id){
        $id = substr($id,9);
        $this->AuthLogin();
        $hotel = DB::table('hotel')
        ->join('location','location.location_id','=','hotel.location')
        ->select('hotel.*','location.*')
        ->where('hotel_id', $id)->get();
        session()->flash('message', 'You are payment hotel successfully!!');
        return view('frontend.layout.payment')->with('hotel', $hotel);
    }

}

