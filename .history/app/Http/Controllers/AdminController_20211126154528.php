<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use App\shipping;
use App\Product;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

use App\User;
use Illuminate\Support\Facades\App;

use function Livewire\str;

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Auth::user()->id;
        
        $admin_role = Auth::user()->role;
        
       

        if (Auth::check()) {
            if ($admin_role == '1') {
                $admin_name = DB::table('users_web')->where('id', $admin_id)->first();
                return Redirect::to('/dashboard')->with(compact('admin_name'))->send();
            } else {
                return Redirect::to('/')->send();
            }
        } else {
            return Redirect::to('/logout/user')->send();
        }
    }
    public function getNameAdmin()
    {
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
    }
    public function getIndexAdmin()
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        return view('backend.layouts.index');
    }
    public function LogoutAdmin()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function getAllHotel()
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        $all_hotel = DB::table("hotel")
             ->join('categories', 'categories.categories_id', '=', 'hotel.type_name')
            
             ->select('hotel.*','categories.*');
        $all_hotel = $all_hotel->orderBy("hotel.hotel_id", "Desc");

        $all_hotel = $all_hotel->paginate(15);
        return view('backend.layouts.Hotel.AllHotels')->with('all_hotel', $all_hotel);
    }
    public function AddHotel(Request $request)
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        $type = DB::table("categories")->get();
        $location = DB::table("location")->get();
        return view('backend.layouts.Hotel.addHotel')->with('type', $type)->with('location', $location);
    }
    public function getSaveHotel(Request $request)
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        $data = array();
        $data['name'] = $request->name;
        $data['type_name'] = $request->type;
        $data['location'] = $request->location;
        $data['person'] = $request->person;
        $data['room'] = $request->room;
        $data['services'] = $request->service;
        $data['hotel_info'] = $request->hotel_info;
        $data['money_day'] = $request->money_day;
        $data['status'] = 0;
       
        if ($request->hasFile('product_image')) {
            $file = $request->product_image;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            $file_name_2 = "press".Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //$file_name_3 = "teacher".Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
                if ($file->getClientOriginalExtension() != "svg") {
                    // $image_resize = Image::make($file->getRealPath());
                    // $thumb_size = json_decode($settings["THUMB_SIZE_TEACHERS"]);
                    // $image_resize->fit($thumb_size->width, $thumb_size->height);
                    // $image_resize->save('public/upload/images/teachers/thumb/' . $file_name);

                    $image_resize_2 = Image::make($file->getRealPath());
                    $image_resize_2->fit(631, 530);
                    $image_resize_2->save('img/hotel/' . $file_name_2);
                }   
            // close upload image
            $file->move("img/hotel/", $file_name);
            //save database
            $data['image'] = $file_name_2;
            DB::table('hotel')->insert($data);
            return Redirect::to('/hotels')->with([ "message" => "Thêm thành công!"]);;
    
            }
            $data['image'] ="";
        DB::table('hotel')->insert($data);
        
        return Redirect::to('/hotels')->with([ "message" => "Thêm thành công!"]);;
    }
    public function EditHotel($id)
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        $type = DB::table("categories")->get();
        $location = DB::table("location")->get();
        $id = substr($id,9);
        $edit_hotel =  DB::table("hotel")->where('hotel_id', $id)->get();
        return view('backend.layouts.Hotel.editHotel')->with('edit_hotel', $edit_hotel)->with('type', $type)->with('location', $location);
    }
    public function UpdateHotel(Request $request, $id)
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        $data = array();
        $data['name'] = $request->name;
        $data['type_name'] = $request->type;
        $data['status'] = 0;
        $data['location'] = $request->location;
        $data['person'] = $request->person;
        $data['room'] = $request->room;
        $data['services'] = $request->service;
        $data['hotel_info'] = $request->hotel_info;
        $data['money_day'] = $request->money_day;
        $data['status'] = 0;
       
        if ($request->hasFile('product_image')) {
            $file = $request->image;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            $file_name_2 = "press".Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //$file_name_3 = "teacher".Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
                if ($file->getClientOriginalExtension() != "svg") {
                    // $image_resize = Image::make($file->getRealPath());
                    // $thumb_size = json_decode($settings["THUMB_SIZE_TEACHERS"]);
                    // $image_resize->fit($thumb_size->width, $thumb_size->height);
                    // $image_resize->save('public/upload/images/teachers/thumb/' . $file_name);

                    $image_resize_2 = Image::make($file->getRealPath());
                    $image_resize_2->fit(631, 530);
                    $image_resize_2->save('img/hotel/' . $file_name_2);
                }   
            // close upload image
            $file->move("img/hotel/", $file_name);
            //save database
            $data['image'] = $file_name_2;
            DB::table('hotel')->where('hotel_id', $id)->update($data);
        
            return Redirect::to('/hotels')->with(["message" => "Cập Nhập thành công!"]);
    
            }
        DB::table('hotel')->where('hotel_id', $id)->update($data);
        
        return Redirect::to('/hotels')->with(["message" => "Cập Nhập thành công!"]);
    }
    public function DeleteHotel($id)
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $key = substr($id,0,9);
        $id = substr($id,9);
        
        DB::table('hotel')->where('hotel_id', $id)->delete();

        
        return Redirect::to('/hotels')->with([ "message" => "Delete thành công!"]);
    }
   
}
