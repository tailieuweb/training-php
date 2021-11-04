<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    public function getAllCategories()
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $categories = DB::table("categories")
            // ->join('protypes', 'protypes.id', '=', 'products.type_id')
            // ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
             ->select('categories.*');
        $categories = $categories->orderBy("categories.categories_id", "Desc");

        $categories = $categories->paginate(15);
        return view('backend.layouts.Categories.AllCategories')->with('categories', $categories);
    }
    public function AddCategories(Request $request)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        // $manu =  DB::table("manufactures")->orderBy("id", "desc")->get();
        // $type =  DB::table("protypes")->orderBy("id", "desc")->get();
        // $gender =  DB::table("genders")->orderBy("id", "desc")->get();
        return view('backend.layouts.Categories.addCategories');
    }
    public function getSaveCategories(Request $request)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['categories_name'] = $request->name;
        
      
        
        DB::table('categories')->insert($data);
        
        return Redirect::to('/categories')->with([ "message" => "Thêm thành công!"]);;
    }
    public function EditCategories($id)
    {
        
        $id = substr($id,9);
        $categories =  DB::table("categories")->where('categories_id', $id)->get();
        return view('backend.layouts.Categories.editCategories')->with('categories', $categories);
    }
    public function UpdateCategories(Request $request, $id)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['categories_name'] = $request->name;
       
       
       
        
        DB::table('categories')->where('categories_id', $id)->update($data);
        
        return Redirect::to('/categories')->with(["message" => "Cập Nhập thành công!"]);
    }
    public function DeleteCategories($id)
    {
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $key = substr($id,0,9);
        $id = substr($id,9);
        
        DB::table('categories')->where('categories_id', $id)->delete();

        
        return Redirect::to('/categories')->with([ "message" => "Delete thành công!"]);
    }
}
