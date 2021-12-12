<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slide;
use App\Protype;
use App\Type;
use App\Product;
use App\Seller;
use App\Manufacture;
use App\Product_Size;
use App\Cart;
use App\Size;
use App\CartItem;
use Auth;
session_start();
class CartController extends Controller
{
    // add cart function
    public function addCart($pro_id,$size_id) {
        $subString = substr($pro_id, 36, -36);
        $pro_id = base64_decode($subString);
        $product = Product::where(DB::raw('md5(id)'),'=',md5($pro_id))->first();
        $subString1 = substr($size_id, 9, -5);
        $size_id = $subString1;
        $size = Size::where(DB::raw('md5(id)'),'=',md5($size_id))->first();
        if($product == null || $size == null) {
            return response()->json(array('typeMsg' => 'danger','message' => 'Invalid data !!!'));
        }
        $price_sell = ($product->promotion_price > 0) ? $product->promotion_price : $product->price;
        $cart = session()->get('cart');
        if(isset($cart[$pro_id])) {
            $check = false;
            for($i = 0;$i< count($cart[$pro_id]);$i++){
                if($cart[$pro_id][$i]['size_name'] == $size->name) {
                    $cart[$pro_id][$i]['quantity']++;
                    $check = true;
                    break;
                }
                else {
                    continue;
                    $check = false;
                }
            }
            if($check == false) {
                $cart[$pro_id][] = [
                    'image' => $product->pro_image,
                    'name' => $product->name,
                    'quantity' => 1,
                    'size_name' => $size->name,
                    'price' => $price_sell
                ];
            }
        }
        else {
            $cart[$pro_id][] = [
                'image' => $product->pro_image,
                'name' => $product->name,
                'quantity' => 1,
                'size_name' => $size->name,
                'price' => $price_sell
            ];
        }
        session()->put('cart',$cart);
        $cart = session()->get('cart');
        $result = "";
        $grand_price = 0;
        foreach($cart as $key => $value) {
            foreach($value as $key => $item) {
                $sub_price = $item['price'] * $item['quantity']; 
                $grand_price += $item['price']*$item['quantity'];
                $result .= '
                <li>
                <a href="#" class="photo"><img src="'. asset('images/' . $item['image']) .'" class="cart-thumb" alt="" /></a>
                <h6><a href="#">'.$item['name'].'</a></h6>
                <p>'.$item['quantity'].'x - '.$item['size_name'].' - <span class="price">'.number_format($sub_price,0).' Đ</span></p>
                </li>';
            }
        }

        return response()->json(array('grand_price' => $grand_price,'result' => $result, 'total' => count($cart), 'message' => 'Add cart successfully !!!'));
    }
    // update cart function
    public function updateCart(Request $req) {
        if(isset($req->id) && isset($req->sub_id) && isset($req->quantity)) {
            $subString = substr($req->id, 36, -36);
            $id = base64_decode($subString);
            $subString1 = substr($req->sub_id, 36, -36);
            $sub_id = base64_decode($subString1);
            $quantity = $req->quantity;
    		$cart = session()->get('cart');
            if(!isset($cart[$id])) {
                return response()->json(array('code' => 100));
            }
            if(!isset($cart[$id][$sub_id])) {
                return response()->json(array('code' => 100));
            }
    		$cart[$id][$sub_id]['quantity'] = $quantity;
    		session()->put('cart',$cart);
    		$cart = session()->get('cart');
            //
            $result = "";
            $grand_price = 0;
            foreach($cart as $key => $value) {
                foreach($value as $key => $item) {
                    $sub_price = $item['price'] * $item['quantity']; 
                    $grand_price += $item['price']*$item['quantity'];
                    $result .= '
                    <li>
                    <a href="#" class="photo"><img src="'. asset('images/' . $item['image']) .'" class="cart-thumb" alt="" /></a>
                    <h6><a href="#">'.$item['name'].'</a></h6>
                    <p>'.$item['quantity'].'x - '.$item['size_name'].' - <span class="price">'.number_format($sub_price,0).' Đ</span></p>
                    </li>';
                }
            }
    		$cartComponents = view('customer.components.core-cart', compact('cart'))->render();
            return response()->json(array('grand_price' => $grand_price,'result' => $result, 'total' => count($cart),'cart' => $cartComponents, 'message' => 'Update cart successfully !!!', 'code' => 200));
    	}
    }
    // delete cart function
    public function deleteCart(Request $req) {
        if(isset($req->id) && isset($req->sub_id)) {
            $subString = substr($req->id, 36, -36);
            $id = base64_decode($subString);
            $subString1 = substr($req->sub_id, 36, -36);
            $sub_id = base64_decode($subString1);
    		$cart = session()->get('cart');
            if(!isset($cart[$id])) {
                return response()->json(array('code' => 100));
            }
            if(!isset($cart[$id][$sub_id])) {
                return response()->json(array('code' => 100));
            }
            unset($cart[$id][$sub_id]);
            if(count($cart[$id]) == 0) {
                unset($cart[$id]);
            }
    		session()->put('cart',$cart);
    		$cart = session()->get('cart');
            //
            $result = "";
            $grand_price = 0;
            foreach($cart as $key => $value) {
                foreach($value as $key => $item) {
                    $sub_price = $item['price'] * $item['quantity']; 
                    $grand_price += $item['price']*$item['quantity'];
                    $result .= '
                    <li>
                    <a href="#" class="photo"><img src="'. asset('images/' . $item['image']) .'" class="cart-thumb" alt="" /></a>
                    <h6><a href="#">'.$item['name'].'</a></h6>
                    <p>'.$item['quantity'].'x - '.$item['size_name'].' - <span class="price">'.number_format($sub_price,0).' Đ</span></p>
                    </li>';
                }
            }
    		$cartComponents = view('customer.components.core-cart', compact('cart'))->render();
    		return response()->json(array('grand_price' => $grand_price,'result' => $result, 'total' => count($cart),'cart' => $cartComponents, 'message' => 'Delete cart successfully !!!', 'code' => 200));
    	}
    }
    // delete cart function
    public function deleteAllCart() {
        session()->forget('cart');
        $cart = session()->get('cart');
        return back()->with(['typeMsg' => 'success','msg' => 'Delete cart successfully !!!']);
    }
}
