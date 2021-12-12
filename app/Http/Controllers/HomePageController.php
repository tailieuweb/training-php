<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function GetProductIsLastest(){
        $ProductIsLastest = products::orderBy('id','DESC')->limit(3)->get();
        $array_cateid = [];
        foreach ($ProductIsLastest as $value){
            $array_cateid[] = $value->category_id;
        }
        $DulieuCate = categories::select('id','name')->whereIn('id',$array_cateid)->get();

        return response()->json(["products"=>$ProductIsLastest,'categories'=>$DulieuCate],200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }
    public  function  GetCategoryIsRamdom(){
        $CategoryIsRamdom = DB::select("SELECT * FROM `categories` ORDER BY RAND() LIMIT 3;");
        return response()->json($CategoryIsRamdom,200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

}
