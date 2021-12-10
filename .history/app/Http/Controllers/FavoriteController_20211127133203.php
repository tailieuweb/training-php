<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FavoriteController extends Controller
{
    public function getAllFavorite()
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $favorite = DB::table("favorite")
            ->join('hotel', 'hotel.hotel_id', '=', 'favorite.hotel_id')
            ->join('users_web', 'users_web.id', '=', 'favorite.user_id')
            // ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
            ->select('favorite.*','hotel.*', 'users_web.*');
        $favorite = $favorite->orderBy("favorite.favorite_id", "Desc");

        $favorite = $favorite->paginate(15);
        return view('backend.layouts.Favorite.AllFavorite')->with('favorite', $favorite);
    }
    //Add new favorite of user
    public function createFavorite(){
        $hotel = DB::table('hotel')
                ->select('hotel.*')->get();
        $user = DB::table('users_web')
                ->select('users_web.*')->get();
                
        return view('backend.layouts.Favorite.AddFavorite', ['user' => $user, 'hotel' => $hotel]);

    }
    //Insert the hotel in table favorite for user
    public function insertFavorite(Request $request){
        $data = array();
        $data['hotel_id'] = $request->hotel_id;
        $data['user_id'] = $request->user_id;
        $data['date_created'] = date("Y-m-d");
        DB::table('favorite')->insert($data);
        return Redirect::to('/admin/favorite');
    }

    //Delete the favorite
    public function deleteFavorite($id)
    {
        // $key = substr($id,0,9);
        $id = substr($id,9);
        var_dump($id);die();
        DB::table('favorite')->where('favorite_id', $id)->delete();
        return Redirect::to('/admin/favorite');
        // return $this->getAllFavorite();
    }
}
