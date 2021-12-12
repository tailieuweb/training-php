<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Product;
use App\Person;
use App\Customer;
use App\Order;
use App\Order_Item;
use Auth;

class OrderController extends Controller
{
    //CUSTOMER 
    function __construct() {
        $product = Product::getInstance();
		view()->share(['product'=>$product]);
	}
    // get order detail customer page
    public function getOrderDetail($id) {
        if(Auth::guard('account_customer')->check()) {
            $account = Auth::guard('account_customer')->user();
            $person = Person::where('account_id','=',$account->id)->first();
            $customer = Customer::where('person_id','=',$person->id)->first();
            $order = Order::where('id','=',$id)->where('customer_id','=',$customer->id)->first();
            if($order == null) {
                return back()->with(['typeMsg' => 'danger','msg' => 'You dont have this order !!!']);
            } else {
                $order_detail = Order_Item::where('order_id','=',$id)->get();
                return view('customer.order_detail', compact('person','order','order_detail'));
            }
        }
    }
    // post cancel order customer
    public function getCancelOrder($id) {
        if(Auth::guard('account_customer')->check()) {
            $order = Order::where('id','=',$id)->first();
            $order->status = 'cancel';
            $order->save();
            return redirect('customer/my-account')->with(['typeMsg' => 'success','msg' => 'Cancel order successfully !!!']);
        }
    }
    // ADMIN
    //get list order page
    public function getList() {
        if(Auth::guard('account_admin')->check()) {
            $order = Order::all();
            return view('admin.list-order',compact('order'));
        } 
    }
    //get detail order 
    public function getDetail($id) {
        if(Auth::guard('account_admin')->check()) {
            $order = Order::where('id','=',$id)->first();
            if($order == null) {
                return redirect('admin-page/error');
            }
            $customer = Customer::where('id','=',$order->customer_id)->first();
            $person = Person::where('id','=',$customer->person_id)->first();
            $account = Account::where('id','=',$person->account_id)->first();
            $order_detail = Order_Item::where('order_id','=',$id)->get();
            return view('admin.order_detail', compact('order','order_detail','customer','person','account'));
        }
    }
    //post change order status for admin 
    public function postStatus(Request $request) {
        $subString = substr($request->order_id, 36, -36);
        $order_id = base64_decode($subString);
        $order = Order::where(DB::raw('md5(id)'),'=',md5($order_id))->first();
        $subString1 = substr($request->status, 36, -36);
        $status = base64_decode($subString1);
        if($order == null || $status == null) {
            return response()->json(array('typeMsg' => 'danger','msg' => 'Failed action !!!'));
        }
        if($status == 0) {
            $order->status = "progress";
        }
        else {
            if($status == 1) {
                $order->status = "delivery";
            }
            else {
                $order->status = "received";
            }
        }
        $order->save();
        return response()->json(array('typeMsg' => 'success','msg' => 'Change status successfully !!!'));
    }
}
