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
            // ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
             ->select('favorite.*','hotel.name');
        $favorite = $favorite->orderBy("favorite.favorite_id", "Desc");

        $favorite = $favorite->paginate(15);
        return view('backend.layouts.Favorite.AllFavorite')->with('favorite', $favorite);
    }
    // public function AddFavorite(Request $request)
    // {
    //     // $this->AuthLogin();
    //     // $admin_id = Session::get('id');
    //     // $admin_name = DB::table('users')->where('id', $admin_id)->first();
    //     // $manu =  DB::table("manufactures")->orderBy("id", "desc")->get();
    //     // $type =  DB::table("protypes")->orderBy("id", "desc")->get();
    //     // $gender =  DB::table("genders")->orderBy("id", "desc")->get();
    //     return view('backend.layouts.Categories.addCategories');
    // }
    // public function getSaveFavorite(Request $request)
    // {
    //     // $this->AuthLogin();
    //     // $admin_id = Session::get('id');
    //     // $admin_name = DB::table('users')->where('id', $admin_id)->first();
    //     $data = array();
    //     $data['name'] = $request->name;
        
    //     // $data['price'] = $request->price;
    //     // $data['type_id'] = $request->type;
    //     // $data['manu_id'] = $request->manu;
    //     // $data['description'] = $request->description;
    //     // $data['sale'] = $request->sale;
    //     // $data['size'] = $request->size;
    //     // $data['gender'] = $request->gender;
       
        
    //     DB::table('categories')->insert($data);
        
    //     return Redirect::to('/categories')->with(["type" => "success", "flash_message" => "Thêm thành công!"]);;
    // }
    // public function EditFavorite($id)
    // {
    //     // $this->AuthLogin();
    //     // $admin_id = Session::get('id');
    //     // $admin_name = DB::table('users')->where('id', $admin_id)->first();
    //     // $manu =  DB::table("manufactures")->orderBy("id", "desc")->get();
    //     // $type =  DB::table("protypes")->orderBy("id", "desc")->get();
    //     // $gender =  DB::table("genders")->orderBy("id", "desc")->get();
    //     $id = substr($id,9);
    //     $categories =  DB::table("categories")->where('id', $id)->get();
    //     return view('backend.layouts.Categories.editCategories')->with('categories', $categories);
    // }
    // public function UpdateFavorite(Request $request, $id)
    // {
    //     // $this->AuthLogin();
    //     // $admin_id = Session::get('id');
    //     // $admin_name = DB::table('users')->where('id', $admin_id)->first();
    //     $data = array();
    //     $data['name'] = $request->name;
       
    //     // $data['price'] = $request->price;
    //     // $data['type_id'] = $request->type;
    //     // $data['manu_id'] = $request->manu;
    //     // $data['description'] = $request->description;
    //     // $data['sale'] = $request->sale;
    //     // $data['size'] = $request->size;
    //     // $data['gender'] = $request->gender;
       
        
    //     DB::table('categories')->where('id', $id)->update($data);
        
    //     return Redirect::to('/categories')->with(["type" => "success", "flash_message" => "Cập Nhập thành công!"]);
    // }
    public function DeleteFavorite($id)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $key = substr($id,0,9);
        $id = substr($id,9);
        
        DB::table('favorite')->where('favorite_id', $id)->delete();

        
        return Redirect::to('/favorite')->with([ "message" => "Delete thành công!"]);
    }
}
