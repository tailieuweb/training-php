<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserRentalController extends Controller
{
    //hien thi toan bo user
    public function getAllUserRental()
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $userRental = DB::table("user_rental")
            ->join('hotel', 'hotel.hotel_id', '=', 'user_rental.hotel_id')
            ->join('users_web', 'users_web.id', '=', 'user_rental.user_id')
            // ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
            ->select('user_rental.*','hotel.*', 'users_web.*');
        $userRental = $userRental->orderBy("user_rental.id_rental", "Desc");

        $userRental = $userRental->paginate(15);
        return view('backend.layouts.User_rental.AllUserRental')->with('userRental', $userRental);
    }
       //add nguoi dung dat phong moi
       public function createUserRental(){
        $hotel = DB::table('hotel')
                ->select('hotel.*')->get();
        $user = DB::table('users_web')
                ->select('users_web.*')->get();
        $userRental = DB::table('user_rental')
                    ->select('user_rental.*')->get();
                
        return view('backend.layouts.User_rental.AddUserRental', ['user' => $user, 'hotel' => $hotel, 'user_rental' => $userRental]);

    }
    //Them nguoi dung da dat phong moi
    public function insertUserRental(Request $request){
        
        $data = array();
        $data['hotel_id'] = $request->hotel_id;
        $data['user_id'] = $request->user_id;
        // $data['user_rental_version'] = 0;
        $data['time_pick'] = $request->timePick;
        $data['time_drop'] = $request->timeDrop;
        $data['time_receip'] = $request->timeReceip;
        $data['total_money'] = $request->totalMoney;
        $data['version'] = 0;
        DB::table('user_rental')->insert($data);
        return Redirect::to('/userRental');
    }

    //Xoa du lieu User Rental
    public function deleteUserRental($id)
    {
        // $key = substr($id,0,9);
        $id = substr($id,9);
        DB::table('user_rental')->where('id_rental', $id)->delete();
        return Redirect::to('/userRental');
        // return $this->getAllFavorite();
    }
    //Get update user_rental (get lấy ra khách hàng đã đặt phòng)
    public function getUpdateUserRental($id){
        $id = substr($id,9);
        $userRental = DB::table('user_rental')->select('user_rental.*')->whereRaw('id_rental = ?',$id)->get();
        $hotel = DB::table('hotel')
                ->select('hotel.*')->get();
        $user = DB::table('users_web')
                ->select('users_web.*')->get();
                //dat ten xac dinh theo bien tranh trung db
        return view('backend.layouts.User_rental.UpdateUserRental', ['user' => $user, 'hotel' => $hotel, 'userRental' => $userRental]);
    }
    //Post update user rental (cap nhat lai gia tri cua user rental) 
    public function postUpdateUserRental($id, Request $request){
        $userRental = DB::table('user_rental')
                    ->select('user_rental.*')
                    ->where('id_rental', $id)->get();
                    //var_dump($userRental);die();
        if($request->version_rental == $userRental[0]->version){
            $data = array();
            $data['hotel_id'] = $request->hotel_id;
            $data['user_id'] = $request->user_id;
            $data['time_pick'] = $request->timePick;
            $data['time_drop'] = $request->timeDrop;
            $data['time_receip'] = $request->timeReceip;
            $data['total_money'] = $request->totalMoney;
            $data['version'] =  $userRental[0]->version + 1;
            DB::table('user_rental')->where('id_rental', $id)->update($data);
        }
        return Redirect::to('/userRental');
    }
}
