<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RatingController extends Controller
{
    public function getAllRating()
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $rating = DB::table("rating")
             ->join('users', 'users.id', '=', 'rating.user_id')
            // ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
             ->select('rating.*','users.name');
        $rating = $rating->orderBy("rating.rating_id", "Desc");

        $rating = $rating->paginate(15);
        return view('backend.layouts.Rating.AllRating')->with('rating', $rating);
    }

    public function DeleteRating($id)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $key = substr($id,0,9);
        $id = substr($id,9);
        
        DB::table('rating')->where('rating_id', $id)->delete();

        
        return Redirect::to('/rating')->with([ "message" => "Delete thành công!"]);
    }
}
