<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class LocationController extends Controller
{
    public function getAllLocation()
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $location = DB::table("location")
            // ->join('protypes', 'protypes.id', '=', 'products.type_id')
            // ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
             ->select('location.*');
        $location = $location->orderBy("location.location_id", "Desc");

        $location = $location->paginate(15);
        return view('backend.layouts.Location.AllLocation')->with('location', $location);
    }
    public function AddLocation(Request $request)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        // $manu =  DB::table("manufactures")->orderBy("id", "desc")->get();
        // $type =  DB::table("protypes")->orderBy("id", "desc")->get();
        // $gender =  DB::table("genders")->orderBy("id", "desc")->get();
        return view('backend.layouts.Location.addLocation');
    }
    public function getSaveLocation(Request $request)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['address'] = $request->address;
        
        // $data['price'] = $request->price;
        // $data['type_id'] = $request->type;
        // $data['manu_id'] = $request->manu;
        // $data['description'] = $request->description;
        // $data['sale'] = $request->sale;
        // $data['size'] = $request->size;
        // $data['gender'] = $request->gender;
       
        
        DB::table('location')->insert($data);
        
        return Redirect::to('/location')->with([ "message" => "Thêm thành công!"]);;
    }
    public function EditLocation($id)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        // $manu =  DB::table("manufactures")->orderBy("id", "desc")->get();
        // $type =  DB::table("protypes")->orderBy("id", "desc")->get();
        // $gender =  DB::table("genders")->orderBy("id", "desc")->get();
        $id = substr($id,9);
        $location =  DB::table("location")->where('location_id', $id)->get();
        return view('backend.layouts.Location.editLocation')->with('location', $location);
    }
    public function UpdateLocation(Request $request, $id)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['address'] = $request->address;
       
        // $data['price'] = $request->price;
        // $data['type_id'] = $request->type;
        // $data['manu_id'] = $request->manu;
        // $data['description'] = $request->description;
        // $data['sale'] = $request->sale;
        // $data['size'] = $request->size;
        // $data['gender'] = $request->gender;
       
        
        DB::table('location')->where('location_id', $id)->update($data);
        
        return Redirect::to('/location')->with([ "message" => "Cập Nhập thành công!"]);
    }
    public function DeleteLocation($id)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $key = substr($id,0,9);
        $id = substr($id,9);
        
        DB::table('location')->where('location_id', $id)->delete();

        
        return Redirect::to('/location')->with([ "message" => "Delete thành công!"]);
    }
}
