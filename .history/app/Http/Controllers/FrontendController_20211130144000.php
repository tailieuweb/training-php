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
use App\Models\User;

use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class FrontendController extends Controller
{
    public function AuthLogin()
    {

        if (Auth::check()) {
            $admin_role = Auth::user()->role;
            if ($admin_role == '1') {

                return Redirect::to('/dashboard')->send();
            } else {
                // $value = $admin_role->session()->get('key');
                // $sess_user = Session.put('user_name', Auth::user()->name);
                return Redirect::to('/');
            }
        } else {
            return Redirect::to('/logout/user');
        }
    }
    public function getLogin()
    {

        if (Auth::check()) {
            $admin_role = Auth::user()->role;
            if ($admin_role == '1') {

                return Redirect::to('/dashboard');
            } else {
                return Redirect::to('/');
            }
        };
        return View('Frontend.layout.login.login');
    }
    public function getProfile()
    {


        return View('Frontend.layout.Account.profile');
    }
    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // $check = DB::table('users_web')
        // ->where('username','=',$request['username'])
        // ->where('password','=',md5($request['password']))->first();        
        if (Auth::attempt(['email' =>  $request->email, 'password' => $request->password])) {
            $admin_role = Auth::user()->role;
            $very = Auth::user()->very_email;
            if ($admin_role == '1') {

                return Redirect::to('/dashboard');
            } else {
                if ($very == 1) {
                    return Redirect::to('/');
                } else {
                    Auth::logout();
                    return Redirect::route('frontend.login.index');
                }
            }
        } else {
            return Redirect::route('frontend.login.index');
            //return "ERROR!!";
        }
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/login/user');
        }
        return  redirect('/login/user');
    }
    public function getRegister()
    {

        return View('Frontend.layout.login.register');
    }
    public function postRegister(Request $request)
    {
        $request = $request->all();
        $titlename = "Đăng ký tài khoản";
        $checkEmail = DB::table('users_web')->where('email', $request['email'])->first();
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
            $check = DB::table('users_web')->where('email', $request['email'])->first();
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
    public function register_accuracy(Request $request)
    {

        $email = $_GET['email'];
        $data = array();
        $data['very_email'] = 1;
        DB::table('users_web')->where('email', $email)->update($data);
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
            ->join('location', 'location.location_id', '=', 'hotel.location')
            ->select('hotel.*', 'location.*');

        $all_hotel = $all_hotel->orderBy("hotel.hotel_id", "DESC");
        $all_hotel = $all_hotel->paginate(15);
        $array_favorite = array();
        if(isset(Auth::user()->id)){
            $array_favorite = $all_hotel;
            $favorite = DB::table('favorite')
                ->select('favorite.*')->get();
            foreach ($array_favorite as $value) {
                foreach($favorite as $love){
                    if($value->hotel_id == $love->hotel_id){
                        $value->favo_check = 1;
                    }
                }
            }
            return View('Frontend.layout.hotel.all-hotel')->with('all_hotel', $all_hotel);
        }
        // $rating_number = $this->getRatingHotelId();

        return View('Frontend.layout.hotel.all-hotel')->with('all_hotel', $all_hotel);
    }
    public function getDetailHotel($id)
    {
        $this->AuthLogin();
        $id = substr($id,9);
        $all_hotel = DB::table('hotel')
            ->join('location', 'location.location_id', '=', 'hotel.location')
            ->where('hotel.hotel_id', $id)
            ->get();
        $rating_number = $this->getRatingHotelId($id);
        //Get comment
        $comment = DB::table('user_comment')
            ->join('users_web', 'users_web.id', '=', 'user_comment.user_id')
            ->select('user_comment.*', 'users_web.*')
            ->where('hotel_id', $id)
            ->orderBy('rating', 'DESC')->limit(3)->get();
        // var_dump(Auth::user()->id);die();
        if (isset(Auth::user()->id)) {
            var_dump($all_hotel[0]->hotel_id);die();
            if ($this->checkRentalHotel($all_hotel[0]->hotel_id, Auth::user()->id) == true) {
                Session::put('user_id', Auth::user()->id);
            } else {
                Session::put('user_id', null);
            }
        } else {
            Session::put('user_id', null);
        }
        $total_comment = $this->getTotalComment($id);
        // var_dump($this->checkRentalHotel($all_hotel[0]->hotel_id, Auth::user()->id));die();
        return View('Frontend.layout.hotel.detail', compact('all_hotel', 'rating_number', 'comment', 'total_comment'));
    }
    public function getRatingHotelId($id)
    {
        $this->AuthLogin();
        $total_rating = 0;

        $rating = DB::table('hotel')
            ->join('rating', 'rating.hotel_id', '=', 'hotel.hotel_id')
            ->where('hotel.hotel_id', $id)->get();
        $count = $rating->count();
        foreach ($rating as $value) {
            $total_rating += $value->number_rating;
        }
        if ($count != 0) {
            $rating_hotel = ceil($total_rating / $count);
        } else {
            $rating_hotel = 0;
        }

        return $rating_hotel;

        return view('frontend.layout.index');
    }

    /**
     * Show hotel in option -- Home --
     */
    public function rentalHotelOption(Request $request)
    {
        $this->AuthLogin();
        $hotel = DB::table('hotel')
            ->join('location', 'location.location_id', '=', 'hotel.location')
            ->select('hotel.*', 'location.*')
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
                <option value="' . $row->name . '">' . $row->hotel_info . '</option>';
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
            ->join('location', 'location.location_id', '=', 'hotel.location')
            ->select('hotel.*', 'location.*')
            ->where('name', 'LIKE', "%{$query}%")->get();

        return View('Frontend.layout.hotel.all-hotel-search')->with('all_hotel', $all_hotel);
    }


    /**
     * Payment hotel by id
     */
    public function paymentHotelById($id, Request $request)
    {
        $this->AuthLogin();
        $hotel = DB::table('hotel')
            ->join('location', 'location.location_id', '=', 'hotel.location')
            ->select('hotel.*', 'location.*')
            ->where('hotel_id', $id)->get();
        $data = array();
        $data['date_begin'] = $request->date_begin;
        $data['date_exit'] = $request->date_exit;
        $data['person'] = $request->person;


        return view('frontend.layout.payment')->with('hotel', $hotel)->with('data', $data);
    }
    public function payment_succsess($id)
    {
        $this->AuthLogin();
        $hotel = DB::table('hotel')
            ->join('location', 'location.location_id', '=', 'hotel.location')
            ->select('hotel.*', 'location.*')
            ->where('hotel_id', $id)->get();
        session()->flash('message', 'You are payment hotel successfully!!');
        return view('frontend.layout.payment')->with('hotel', $hotel);
    }
    //Check user rental this hotel?
    public function checkRentalHotel($hotel_id, $user_id)
    {
        $this->AuthLogin();
        $hotel = DB::table('user_rental')
            ->select('user_rental.*')
            ->where('user_id', $user_id)
            ->where('hotel_id', $hotel_id)->get();
        // var_dump($hotel[0]);die();
        if (isset($hotel[0])) {
            if (!empty($hotel)) {
                return true;
            }
        }
        return false;
    }
    //Post comment of user
    public function postComment($id, Request $request){
        $this->AuthLogin();
        
        $comment = array();
        $comment['user_id'] = Auth::user()->id;
        $comment['hotel_id'] = $id;
        $comment['rating'] = $request->rating;
        $comment['content'] = $request->content;
        $date = date('Y/m/d', time());
        $comment['time_cmt'] = $date;
        DB::table('user_comment')->insert($comment);

        //Get detail of hotel
        $all_hotel = DB::table('hotel')
            ->join('location', 'location.location_id', '=', 'hotel.location')
            ->where('hotel.hotel_id', $id)
            ->get();
        $rating_number = $this->getRatingHotelId($id);
        //Get comment
        $comment = DB::table('user_comment')
            ->join('users_web', 'users_web.id', '=', 'user_comment.user_id')
            ->select('user_comment.*', 'users_web.*')
            ->where('hotel_id', $id)
            ->orderBy('rating', 'DESC')->limit(3)->get();
        // var_dump(Auth::user()->id);die();
        if (isset(Auth::user()->id)) {
            if ($this->checkRentalHotel($all_hotel[0]->hotel_id, Auth::user()->id) == true) {
                Session::put('user_id', Auth::user()->id);
            } else {
                Session::put('user_id', null);
            }
        } else {
            Session::put('user_id', null);
        }
        $total_comment = $this->getTotalComment($id);
        // var_dump($this->checkRentalHotel($all_hotel[0]->hotel_id, Auth::user()->id));die();
        return View('Frontend.layout.hotel.detail', compact('all_hotel', 'rating_number', 'comment', 'total_comment'));
    }
    //Get total user comment for 1 hotel
    public function getTotalComment($id){
        $comment = DB::table('user_comment')
        ->join('users_web', 'users_web.id', '=', 'user_comment.user_id')
        ->select('user_comment.*', 'users_web.*')
        ->where('hotel_id', $id)->get();
        return count($comment);
    }
    //Add object in table user_rental
    public function addReceipForUser($id, Request $request){
        $this->AuthLogin();
        
        $rental = array();
        $rental['user_id'] = Auth::user()->id;
        $rental['hotel_id'] = $id;
        $rental['time_pick'] = $request->date_pick;
        $rental['time_drop'] = $request->date_drop;
        $date = date('Y/m/d', time());
        $rental['time_receip'] = $date;
        $rental['total_money'] = $request->total_money;
        DB::table('user_rental')->insert($rental);

        return View('Frontend.layout.receip', compact('rental'));
    }
    //Get hotel in the favorite of user
    public function getAllHotelFavorite(){
        $favorite = DB::table('hotel')
                    ->join('favorite', 'hotel.hotel_id', '=', 'favorite.hotel_id')
                    ->join('location', 'location.location_id', '=', 'hotel.location')
                    ->select('hotel.*', 'favorite.*', 'location.*')
                    ->get();
        return View('Frontend.layout.favorite.index', compact('favorite'));
    }
    //Post the hotel favorite of user
    public function postFavoriteOfUser(Request $request){
        $this->AuthLogin();
        if(isset(Auth::user()->id)){
            $getFavorite = DB::table('favorite')
                    ->where('hotel_id', $request->hotel_id)
                    ->where('user_id', Auth::user()->id)
                    ->get();
            $data = array();
            $data['hotel_id'] = $request->hotel_id;
            $data['user_id'] = Auth::user()->id;
            $data['date_created'] = date("Y-m-d");
            if(count($getFavorite) != 0){
                DB::table('favorite')->where('favorite_id', $getFavorite[0]->favorite_id)->delete();
                return $this->getAllHotel();
            }
        }
        DB::table('favorite')->insert($data);
        return $this->getAllHotel();
    }
}
