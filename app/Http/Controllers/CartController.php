<?php

namespace App\Http\Controllers;

use App\Models\user_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public  function  Save(Request  $request){
      $user = Auth::user();
        $id = $user->id ;
       // $data = user_cart::firstOrNew(['product_id'=> $request->product_id],['']);
    }

    public  function Show(Request  $request){

        $user = Auth::user();
        $id = $user->id ;
       $cart = user_cart::where('user_id',$id)->get();
       return response()->json(['cart'=>$cart]);
    }
}
