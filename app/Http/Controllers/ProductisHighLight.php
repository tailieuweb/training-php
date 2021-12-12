<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Tuấn ProductisHighLight controller 
class ProductisHighLight extends Controller
{
    public function getProductisInteresting(){
        $product_id = [];
        $cart_data = DB::select('SELECT COUNT(DISTINCT user_id) AS quantity , product_id FROM `user_cart` GROUP BY product_id order BY quantity DESC');
        foreach($cart_data as $data){
            $product_id[]= $data->product_id;
        }
        $product_data = DB::table('products')->whereIn('id',$product_id)->get();
        $tonghopdata = [$cart_data,$product_data];
        return response()->json($tonghopdata,200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public  function  getProductIsBoughtMuch(){
        $product_id = [];
        $order_details_data = DB::select('Select product_id,sum(order_quantity) as order_quantity from order_details group by product_id ORDER BY order_quantity DESC;');
        foreach($order_details_data as $data){
            $product_id[]= $data->product_id;
        }
        $product_data = DB::table('products')->whereIn('id',$product_id)->get();
        $tonghopdata = [$order_details_data,$product_data];
        return response()->json($tonghopdata,200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

}
