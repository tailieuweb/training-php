<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Person;
use App\Customer;
use App\Product;
use App\Seller;
use App\Order;
use App\Order_Item;
use App\Cart;
use App\Size;
use Auth;
use Mail;

class CheckoutController extends Controller
{
    // return checkout page  
    public function getCheckout() {
        $user = Auth::guard('account_customer')->check() ? Auth::guard('account_customer')->user() : null;
        $cart = session()->has('cart') ? session()->get('cart') : null;
        if($user != null) {
            $user_id = $user->id;
            $person = Person::find($user_id);
            $customer = Customer::where('person_id','=',$person->id)->first();
            if($cart == null) {
                return back()->with(['typeMsg' => 'danger','msg' => 'Your cart is null !!!']);  
            } 
            if(count($cart) <= 0) {
                return back()->with(['typeMsg' => 'danger','msg' => 'Your cart is null !!!']);  
            } 
            else {
                return view('customer.checkout', compact('cart','user','person','customer'));
            }
        }
    } 
    //post checkout
    public function postCheckout(Request $request) {
        $account = (Auth::guard('account_customer')->check()) ? Auth::guard('account_customer')->user() : null;
        $cart = session()->has('cart') ? session()->get('cart') : null;
        if($account != null && $cart != null) {
            $grand_price = 0;
            $grand_total = 0;
            foreach($cart as $key => $value) {
                foreach($value as $key => $item) {
                    $grand_price += $item['price']*$item['quantity'];
                    $grand_total += $item['quantity'];
                }
            }
            $person = Person::where('account_id','=',$account->id)->first();
            $customer = Customer::where('person_id','=',$person->id)->first();
            if($customer->type != 'vip') {
                $ship_cost = 20000;    
            } else {
                $ship_cost = 0;
            }
            $grand_price_origin = $grand_price;
            $grand_price += $ship_cost;
            $order = new Order();
            $order->customer_id = $customer->id;
            $order->total_quantity = $grand_total;
            $order->grand_price = $grand_price;
            $order->note = ($request->note == null) ? '' : $request->note;
            $order->status = "progress";
            $order->save();
            // thêm chi tiết đơn hàng
            $order_id = $order->id;
            foreach($cart as $key => $value) {
                $product_id = $key;
                foreach($value as $key => $item) {
                    $order_item = new Order_Item();
                    $order_item->order_id = $order_id;
                    $order_item->product_id = $product_id;
                    $order_item->price_sell = $item['price'];
                    $order_item->size = $item['size_name'];
                    $order_item->quantity = $item['quantity'];
                    $sub_price = $item['price'] * $item['quantity'];
                    $order_item->sub_price = $sub_price;
                    $order_item->save();
                }
            }
            $this->sendConfirmOrderMail($person, $cart, $grand_price_origin, $ship_cost);
            session()->forget('cart');
            return redirect(url('/customer/my-account'))->with(['typeMsg'=>'success','msg'=>'Your order is being processed !']);
        }
    }
    // send confirm order email
    function sendConfirmOrderMail($person, $cart, $grand_price_origin, $ship_cost){
        $data = array("person" => $person, 'cart' => $cart, "grand_price_origin" => $grand_price_origin, "ship_cost" => $ship_cost);
        $email = $person->email;
        Mail::send('customer.email.order_mail',$data,function($message) use ($email){
            $message->to($email)->subject("Confirm Mail");
            $message->from("luxurywatches.shoponline@gmail.com","TCLM Shop");
        });
    }
}
